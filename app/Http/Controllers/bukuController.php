<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;

class bukuController extends Controller
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
        $data = $this->model->buku()->get();
        return view('backend_view.master.buku.buku_index', compact('data'));
    }
    public function create()
    {
        $kategoris = $this->model->kategori()->get();
        $penerbits = $this->model->penerbit()->get();
        $pengarangs = $this->model->pengarang()->get();
        return view('backend_view.master.buku.buku_create', compact('kategoris', 'penerbits', 'pengarangs'));
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'kode' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'pinjam' => 'required',
        ]);
        $id = $this->model->buku()->max('mb_id') + 1;
        if ($validasi == true) {
            $this->model->buku()->create([
                'mb_id' => $id,
                'mb_kode' => $req->kode,
                'mb_kategori' => $req->kategori,
                'mb_penerbit' => $req->penerbit,
                'mb_pengarang' => $req->pengarang,
                'mb_created_by'=>Auth::user()->id,
                'mb_created_at' => date('Y-m-d H:i:s'),
                'mb_name' => $req->name,
                'mb_desc' => $req->desc,
                'mb_pinjam' => $req->pinjam,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->penerbit()->where('mpn_id', $req->id)->first();
        return view('backend_view.master.penerbit.penerbit_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);
        if ($validasi == true) {
            $this->model->penerbit()->where('mpn_id', $req->id)->update([
                'mpn_name' => $req->name,
                'mpn_alamat' => $req->alamat,
                'mpn_tlp' => $req->tlp,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $this->model->penerbit()->where('mpn_id', $req->id)->delete();
        return redirect()->back();
    }
}
