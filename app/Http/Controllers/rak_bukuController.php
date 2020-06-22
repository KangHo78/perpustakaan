<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;

class rak_bukuController extends Controller
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
        $data = $this->model->rak_buku()->get();
        return view('backend_view.master.rak_buku.rak_buku_index', compact('data'));
    }
    public function create()
    {
        
        return view('backend_view.master.rak_buku.rak_buku_create');
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'kode' => 'required',
            'name' => 'required',
            'lokasi' => 'required',
        ]);
        $id = $this->model->rak_buku()->max('mrb_id') + 1;
        if ($validasi == true) {
            $this->model->rak_buku()->create([
                'mrb_id' => $id,
                'mrb_kode' => $req->kode,
                'mrb_name' => $req->name,
                'mrb_lokasi_rak' => $req->lokasi,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function get_kode(Request $req)
    {
        $rak_awal = 'RAK/'.strtoupper($req->alphabet);
        $cek_data = $this->model->rak_buku()->where('mrb_kode','like','%'.$rak_awal.'%')->get();
        $id = count($cek_data)+1;
        return $kode = $rak_awal.'/'.str_pad($id, 3, '0', STR_PAD_LEFT);
    }
    public function save_dt(Request $req)
    {
        $kode = $this->model->rak_buku()->select('mrb_kode')->where('mrb_id',$req->id)->first();
        $dt = $this->model->rak_buku_dt()->where('mrbd_id',$req->id)->max('mrbd_dt') + 1;
        $kode = $kode->mrb_kode.'/'.str_pad($req->angka, 2, '0', STR_PAD_LEFT);
        $user = $this->model->user()->get();
        $this->model->rak_buku_dt()->create([
                'mrbd_id' => $req->id,
                'mrbd_dt' => $dt,
                'mrbd_kode' => $kode,
            ]);
        return Response()->json(['status' => 'sukses']);
    }
    public function edit(Request $req)
    {
        $data = $this->model->rak_buku()->where('mrb_id', $req->id)->first();
        return view('backend_view.master.rak_buku.rak_buku_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $this->model->rak_buku()->where('mrb_id', $req->id)->update([
            'mrb_name' => $req->name,
            'mrb_lokasi_rak' => $req->lokasi,
        ]);
        return Response()->json(['status' => 'sukses']);
    }
    public function hapus(Request $req)
    {
        $this->model->rak_buku()->where('mrb_id', $req->id)->delete();
        $this->model->rak_buku_dt()->where('mrbd_id', $req->id)->delete();
        return redirect()->back();
    }
    public function deletes_dt(Request $req)
    {
        $this->model->rak_buku_dt()->where('mrbd_kode', $req->kode)->delete();
        return Response()->json(['status' => 'sukses','hasil'=>$req->kode,'id'=>$req->id]);
    }
}
