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
            'name' => 'required',
        ]);
        $id = $this->model->rak_buku()->max('mp_id') + 1;
        if ($validasi == true) {
            $this->model->rak_buku()->create([
                'mp_id' => $id,
                'mp_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->rak_buku()->where('mp_id', $req->id)->first();
        return view('backend_view.master.rak_buku.rak_buku_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $validasi = $this->rak_buku($req, [
            'name' => 'required',
        ]);
        if ($validasi == true) {
            $this->model->rak_buku()->where('mp_id', $req->id)->update([
                'mp_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        DB::table('m_rak_buku')->where('mp_id', $req->id)->delete();
        return redirect()->back();
    }
}
