<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
use Auth;
class transaksi_peminjamanController extends Controller
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
        $data = $this->model->peminjaman()->with(['peminjaman_dt','peminjaman_dt.buku_dt','peminjaman_dt.buku_dt.buku'])->get();
        return view('backend_view.transaksi.peminjaman.peminjaman_index', compact('data'));
    }
    public function create()
    {
        $id = $this->model->peminjaman()->max('tpj_id')+1;
        $date = date('m').date('y');
        $kode = 'PJ/'.$date.'/'.str_pad($id, 5, '0', STR_PAD_LEFT);
        $user = $this->model->user()->get();
        $buku = $this->model->buku_dt()->where('mbdt_status','TERSEDIA')->where('mbdt_kondisi','BAIK')
                     ->with(['buku'=>function($q){
                        return $q->where('mb_pinjam','YA');
                     }])
                     ->get();
        return view('backend_view.transaksi.peminjaman.peminjaman_create',compact('user','kode','buku'));
    }
    public function get_data_buku(Request $req)
    {
        $buku = $this->model->buku_dt()->where('mbdt_isbn',$req->isbn)->with('buku')->first();

        return Response()->json(['status' => 'sukses','hasil'=>$buku]);
    }
    public function get_data_buku_remove(Request $req)
    {
        $this->model->buku_dt()->where('mbdt_isbn',$req->isbn)->update([
            'mbdt_status'=>'TERSEDIA',
        ]);
        $this->model->peminjaman_dt()->where('tpjdt_isbn',$req->isbn)->delete();
        $buku = $this->model->buku_dt()->where('mbdt_status','TERSEDIA')
                     ->with(['buku'=>function($q){
                        return $q->where('mb_pinjam','YA');
                     }])
                     ->get();
        return Response()->json(['status' => 'sukses','hasil'=>$buku]);
    }
    public function save(Request $req)
    {   
        // dd($req->all());
        
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

            $id = $this->model->peminjaman()->max('tpj_id')+1;
            $this->model->peminjaman()->create([
                'tpj_id'=>$id,
                'tpj_kode' =>$req->kode,
                'tpj_anggota'=>$req->peminjam,
                'tpj_staff'=>Auth::user()->id,
                'tpj_date_pinjam' =>date('Y-m-d'),
                'tpj_date_kembali' =>$date_kembali,
                'tpj_created_by' =>Auth::user()->id,
                'tpj_created_at' =>date('Y-m-d'),
                'tpj_date_tempo' =>$date_tempo,
            ]);
            for ($i=0; $i <count($req->isbn) ; $i++) { 
                $dt = $this->model->peminjaman_dt()->max('tpjdt_id')+1;
                $this->model->peminjaman_dt()->create([
                    'tpjdt_id'  =>$id,
                    'tpjdt_dt'  =>$dt,
                    'tpjdt_isbn' =>$req->isbn[$i],
                ]);

                $this->model->buku_dt()->where('mbdt_isbn',$req->isbn[$i])->update([
                    'mbdt_status'=>'TERPINJAM',
                ]);

                $log_id = $this->model->log()->max('log_id')+1;
                $this->model->log()->create([
                    'log_id'=>$log_id,
                    'log_name'=>'PEMINJAMAN BUKU ATAS ISBN = '.$req->isbn[$i],
                    'log_kode'=>$req->isbn[$i],
                    'log_feature'=>'PEMINJAMAN',
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
        $data = $this->model->peminjaman()->with(['peminjaman_dt','peminjaman_dt.buku_dt','peminjaman_dt.buku_dt.buku'])->where('tpj_id', $req->id)->first();
        $user = $this->model->user()->get();
        $buku = $this->model->buku_dt()
                     ->where('mbdt_status','TERSEDIA')
                     ->with(['buku'=>function($q){
                        return $q->where('mb_pinjam','YA');
                     }])
                     ->get();
        return view('backend_view.transaksi.peminjaman.peminjaman_edit', compact('data','user','buku'));
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

            $this->model->peminjaman()->where('tpj_id',$req->id)->update([
                'tpj_anggota'=>$req->peminjam,
                'tpj_staff'=>Auth::user()->id,
                'tpj_date_pinjam' =>date('Y-m-d'),
                'tpj_date_kembali' =>$date_kembali,
                'tpj_created_by' =>Auth::user()->id,
                'tpj_date_tempo' =>$date_tempo,
            ]);
            $this->model->peminjaman_dt()->where('tpjdt_id',$req->id)->delete();
            for ($i=0; $i <count($req->isbn) ; $i++) { 
                $this->model->peminjaman_dt()->create([
                    'tpjdt_id'  =>$req->id,
                    'tpjdt_dt'  =>$i+1,
                    'tpjdt_isbn' =>$req->isbn[$i],
                ]);

                $this->model->buku_dt()->where('mbdt_isbn',$req->isbn[$i])->update([
                    'mbdt_status'=>'TERPINJAM',
                ]);

                $log_id = $this->model->log()->max('log_id')+1;
                $this->model->log()->create([
                    'log_id'=>$log_id,
                    'log_name'=>'PEMINJAMAN BUKU ATAS ISBN = '.$req->isbn[$i],
                    'log_kode'=>$req->isbn[$i],
                    'log_feature'=>'PEMINJAMAN',
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
        $peminjaman_dt = $this->model->peminjaman_dt()->where('tpjdt_id', $req->id)->get();
        for ($i=0; $i <count($peminjaman_dt) ; $i++) { 
            $detail[$i] = $this->model->buku_dt()->where('mbdt_isbn',$peminjaman_dt[$i]->tpjdt_isbn)
                ->update([
                    'mbdt_status'=>'TERSEDIA',
                ]);
        }

        $data = $this->model->peminjaman()->where('tpj_id', $req->id)->delete();
        $data = $this->model->peminjaman_dt()->where('tpjdt_id', $req->id)->delete();
        return redirect()->back();
    }
}
