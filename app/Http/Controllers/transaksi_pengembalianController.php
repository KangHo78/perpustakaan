<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
use Auth;
class transaksi_pengembalianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new models();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->model->pengembalian()->with(['pengembalian_dt','pengembalian_dt.buku_dt','pengembalian_dt.buku_dt.buku'])->get();
        return view('backend_view.transaksi.pengembalian.pengembalian_index', compact('data'));
    }
    public function create()
    {
        $id = $this->model->pengembalian()->max('tpg_id')+1;
        $date = date('m').date('y');
        $kode = 'PG/'.$date.'/'.str_pad($id, 5, '0', STR_PAD_LEFT);
        $peminjaman = $this->model->peminjaman()->DoesntHave('pengembalian')->with('peminjaman_anggota')->get();
        return view('backend_view.transaksi.pengembalian.pengembalian_create',compact('kode','peminjaman'));
    }
    public function get_data_peminjaman(Request $req)
    {
        $peminjaman = $this->model->peminjaman()->where('tpj_id',$req->id_peminjaman)->with(['peminjaman_anggota','peminjaman_dt','peminjaman_dt.buku_dt','peminjaman_dt.buku_dt.buku'])->first();

        return Response()->json(['status' => 'sukses','hasil'=>$peminjaman]);
    }
    public function save(Request $req)
    {   
        // dd($req->all());
        
        DB::beginTransaction();
        try {
            $total_unique = array_unique($req->isbn);

            $id = $this->model->pengembalian()->max('tpg_id')+1;
            $this->model->pengembalian()->create([
                'tpg_id'=>$id,
                'tpg_kode' =>$req->kode,
                'tpg_anggota'=>$req->peminjam,
                'tpg_staff'=>Auth::user()->id,
                'tpg_date_pinjam' =>date('Y-m-d'),
                'tpg_date_kembali' =>$date_kembali,
                'tpg_created_by' =>Auth::user()->id,
                'tpg_created_at' =>date('Y-m-d'),
                'tpg_date_tempo' =>$date_tempo,
            ]);
            for ($i=0; $i <count($req->isbn) ; $i++) { 
                $dt = $this->model->pengembalian_dt()->max('tpgdt_id')+1;
                $this->model->pengembalian_dt()->create([
                    'tpgdt_id'  =>$id,
                    'tpgdt_dt'  =>$dt,
                    'tpgdt_isbn' =>$req->isbn[$i],
                ]);

                $this->model->buku_dt()->where('mbdt_isbn',$req->isbn[$i])->update([
                    'mbdt_status'=>'TERPINJAM',
                ]);

                $log_id = $this->model->log()->max('log_id')+1;
                $this->model->log()->create([
                    'log_id'=>$log_id,
                    'log_name'=>'pengembalian BUKU ATAS ISBN = '.$req->isbn[$i],
                    'log_kode'=>$req->isbn[$i],
                    'log_feature'=>'pengembalian',
                    'log_action'=>'CREATE',
                    'log_created_by'=>Auth::user()->id,
                    'log_created_at'=>date('Y-m-d h:i:s'),
                ]);
            }

            DB::commit();
            
            return Response()->json(['status' => 'sukses']);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return Response()->json(['status' => 'error']);
        }
            
    }
    public function edit(Request $req)
    {
        $data = $this->model->pengembalian()->with(['pengembalian_dt','pengembalian_dt.buku_dt','pengembalian_dt.buku_dt.buku'])->where('tpg_id', $req->id)->first();
        $user = $this->model->user()->get();
        $buku = $this->model->buku_dt()
                     ->where('mbdt_status','TERSEDIA')
                     ->with(['buku'=>function($q){
                        return $q->where('mb_pinjam','YA');
                     }])
                     ->get();
        return view('backend_view.transaksi.pengembalian.pengembalian_edit', compact('data','user','buku'));
    }
    public function update(Request $req)
    {
        DB::beginTransaction();
        try {
            $total_unique = array_unique($req->isbn);
            if (count($req->isbn) != count($total_unique)) {
                return Response()->json(['status' => 'duplicate']);
            }
            $check_role_user = $user = $this->model->user()->where('id',$req->peminjam)->first();

            if ($check_role_user->previleges == 4) {
                $date_kembali = date('Y-m-d',strtotime('+21 day'));            
                $date_tempo = date('Y-m-d',strtotime('+28 day'));            
            }elseif($check_role_user->previleges == 5){
                $date_kembali = date('Y-m-d',strtotime('+84 day'));            
                $date_tempo = date('Y-m-d',strtotime('+98 day'));
            }else{
                return Response()->json(['status' => 'bukan_user']);
            }

            $this->model->pengembalian()->where('tpg_id',$req->id)->update([
                'tpg_anggota'=>$req->peminjam,
                'tpg_staff'=>Auth::user()->id,
                'tpg_date_pinjam' =>date('Y-m-d'),
                'tpg_date_kembali' =>$date_kembali,
                'tpg_created_by' =>Auth::user()->id,
                'tpg_date_tempo' =>$date_tempo,
            ]);
            $this->model->pengembalian_dt()->where('tpgdt_id',$req->id)->delete();
            for ($i=0; $i <count($req->isbn) ; $i++) { 
                $this->model->pengembalian_dt()->create([
                    'tpgdt_id'  =>$req->id,
                    'tpgdt_dt'  =>$i+1,
                    'tpgdt_isbn' =>$req->isbn[$i],
                ]);

                $this->model->buku_dt()->where('mbdt_isbn',$req->isbn[$i])->update([
                    'mbdt_status'=>'TERPINJAM',
                ]);

                $log_id = $this->model->log()->max('log_id')+1;
                $this->model->log()->create([
                    'log_id'=>$log_id,
                    'log_name'=>'pengembalian BUKU ATAS ISBN = '.$req->isbn[$i],
                    'log_kode'=>$req->isbn[$i],
                    'log_feature'=>'pengembalian',
                    'log_action'=>'EDIT',
                    'log_created_by'=>Auth::user()->id,
                    'log_created_at'=>date('Y-m-d h:i:s'),
                ]);
            }

            DB::commit();
            
            return Response()->json(['status' => 'sukses']);

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return Response()->json(['status' => 'error']);
        }
    }
    public function hapus(Request $req)
    {
        $data = $this->model->pengembalian()->where('mk_id', $req->id)->delete();
        return redirect()->back();
    }
}
