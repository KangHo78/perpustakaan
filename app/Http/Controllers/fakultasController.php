<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
use Auth;

class fakultasController extends Controller
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
        $data = $this->model->fakultas()->get();

        return view('backend_view.master.fakultas.fakultas_index', compact('data'));
    }
    public function create()
    {
        
        $id = $this->model->fakultas()->max('mf_id') + 1;
        $date = date('m').date('y');
        $kode = 'FK/'.$date.'/'.str_pad($id, 5, '0', STR_PAD_LEFT);
        return view('backend_view.master.fakultas.fakultas_create', compact('kode'));
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'kode' => 'required',
            'name' => 'required',
        ]);
        $id = $this->model->fakultas()->max('mf_id') + 1;
        $date = date('m').date('y');
        $kode = 'FK/'.$date.'/'.str_pad($id, 5, '0', STR_PAD_LEFT);
        if ($validasi == true) {
            $this->model->fakultas()->create([
                'mf_id' => $id,
                'mf_kode' => $req->kode,
                'mf_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $id = $this->model->fakultas()->max('mf_id') + 1;
        $date = date('m').date('y');
        $kode = 'FK/'.$date.'/'.str_pad($id, 5, '0', STR_PAD_LEFT);
        $data = $this->model->fakultas()->where('mf_id', $req->id)->first();
        return view('backend_view.master.fakultas.fakultas_edit', compact('data', 'kode'));
    }
    public function update(Request $req)
    {
        $validasi = $this->validate($req, [
            'kode' => 'required',
            'name' => 'required',
        ]);
        if ($validasi == true) {
            $this->model->fakultas()->where('mf_id', $req->id)->update([
                'mf_kode' => $req->kode,
                'mf_name' => $req->name,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $this->model->fakultas()->where('mf_id', $req->id)->delete();
        return redirect()->back();
    }
}
