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
    public function edit(Request $req)
    {
        $data = $this->model->rak_buku()->where('mrb_id', $req->id)->first();
        return view('backend_view.master.rak_buku.rak_buku_edit', compact('data'));
    }
    public function update(Request $req)
    {
        
            $this->model->rak_buku()->where('mrb_id', $req->id)->update([
                'mrb_kode' => $req->kode,
                'mrb_name' => $req->name,
                'mrb_lokasi_rak' => $req->lokasi,
            ]);
            return Response()->json(['status' => 'sukses']);
    }
    public function hapus(Request $req)
    {
        DB::table('m_rak_buku')->where('mrb_id', $req->id)->delete();
        return redirect()->back();
    }
}
