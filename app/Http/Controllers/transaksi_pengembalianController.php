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
    public function get_data_pengembalian(Request $req)
    {
        $data = $this->model->pengembalian()->with(['pengembalian_anggota','pengembalian_dt','pengembalian_dt.buku_dt','pengembalian_dt.buku_dt.buku'])->where('tpg_peminjaman', $req->id_peminjaman)->first();

        return Response()->json(['status' => 'sukses','hasil'=>$data]);
    }
    public function save(Request $req)
    {   

        DB::beginTransaction();
        try {
            $total_unique = array_unique($req->isbn);

            $id = $this->model->pengembalian()->max('tpg_id')+1;
            $this->model->pengembalian()->create([
                'tpg_id'=>$id,
                'tpg_kode' =>$req->kode,
                'tpg_peminjaman' =>$req->kode_pinjam,
                'tpg_anggota'=>$req->peminjam_id,
                'tpg_staff'=>Auth::user()->id,
                'tpg_date_pinjam' =>$req->tgl_pinjam,
                'tpg_date_kembali' =>date('Y-m-d',strtotime($req->tgl_kembali)),
                'tpg_created_by' =>Auth::user()->username,
                'tpg_created_at' =>date('Y-m-d'),
                'tpg_date_tempo' =>$req->tgl_tempo,
            ]);
            for ($i=0; $i <count($req->isbn) ; $i++) { 
                $dt = $this->model->pengembalian_dt()->max('tpgdt_id')+1;
                $this->model->pengembalian_dt()->create([
                    'tpgdt_id'  =>$id,
                    'tpgdt_dt'  =>$dt,
                    'tpgdt_isbn' =>$req->isbn[$i],
                    'tpgdt_kondisi' =>$req->kondisi[$i],
                ]);

                $this->model->buku_dt()->where('mbdt_isbn',$req->isbn[$i])->update([
                    'mbdt_status'=>'TERSEDIA',
                    'mbdt_kondisi'=>$req->kondisi[$i],
                ]);

                $log_id = $this->model->log()->max('log_id')+1;
                $this->model->log()->create([
                    'log_id'=>$log_id,
                    'log_name'=>'pengembalian BUKU ATAS ISBN = '.$req->isbn[$i],
                    'log_kode'=>$req->isbn[$i],
                    'log_feature'=>'pengembalian',
                    'log_action'=>'CREATE',
                    'log_created_by'=>Auth::user()->id,
                    'log_user'=>Auth::user()->id,
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
        $data_ex = $this->model->pengembalian()->select('tpg_peminjaman')->where('tpg_id','!=', $data->tpg_peminjaman)->get();
        $dt_ex = [];
        for ($i=0; $i < count($data_ex); $i++) { 
            $dt_ex[] = $data_ex[$i]->tpg_peminjaman;
        }
        $peminjaman = $this->model->peminjaman()
                ->whereHas('pengembalian', function($query) use ($data) {
                  $query->where('tpg_peminjaman', $data->tpg_peminjaman);
                })->with('peminjaman_anggota')->get();

        $user = $this->model->user()->get();
        $buku = $this->model->buku_dt()
                     ->where('mbdt_status','TERSEDIA')
                     ->with(['buku'=>function($q){
                        return $q->where('mb_pinjam','YA');
                     }])
                     ->get();
        return view('backend_view.transaksi.pengembalian.pengembalian_edit', compact('data','user','buku','peminjaman'));
    }
    public function update(Request $req)
    {
        DB::beginTransaction();
        try {
            $this->model->pengembalian()->where('tpg_id',$req->id)->update([
                        'tpg_date_kembali'=>date('Y-m-d',strtotime($req->tgl_kembali)),
                    ]);
            DB::commit();
            
            return Response()->json(['status' => 'sukses']);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return Response()->json(['status' => 'error']);
        }

    }
    public function hapus(Request $req)
    {
        return $pengembalian = $this->model->pengembalian()->where('tpg_id', $req->id)->get();
        $pengembalian_dt = $this->model->pengembalian_dt()->where('tpgdt_id', $req->id)->get();

        // for ($i=0; $i <count($pengembalian_dt) ; $i++) { 
        //     $detail[$i] = $this->model->buku_dt()->where('mbdt_isbn',$pengembalian_dt[$i]->tpjdt_isbn)
        //         ->update([
        //             'mbdt_status'=>'TERSEDIA',
        //         ]);
        // }

        $peminjaman_dt = $this->model->pengembalian()->where('tpg_id', $pengembalian->tpg_peminjaman)->get();
        $pengembalian_dt = $this->model->pengembalian_dt()->where('tpgdt_id', $pengembalian->tpg_peminjaman)->get();


        $data = $this->model->pengembalian()->where('tpj_id', $req->id)->delete();
        $data = $this->model->pengembalian_dt()->where('tpjdt_id', $req->id)->delete();
        return redirect()->back();
    }
}
