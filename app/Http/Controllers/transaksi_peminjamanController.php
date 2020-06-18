<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;

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
        return view('backend_view.transaksi.peminjaman.peminjaman_create');
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
        ]);
        $id = $this->model->peminjaman()->max('mk_id') + 1;
        if ($validasi == true) {
            $this->model->peminjaman()->create([
                'mk_id' => $id,
                'mk_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->peminjaman()->where('mk_id', $req->id)->first();
        return view('backend_view.transaksi.peminjaman.peminjaman_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
        ]);
        if ($validasi == true) {
            $this->model->peminjaman()->where('mk_id', $req->id)->update([
                'mk_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $data = $this->model->peminjaman()->where('mk_id', $req->id)->delete();
        return redirect()->back();
    }
}
