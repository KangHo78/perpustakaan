<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;

class rak_buku_dtController extends Controller
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
        $data = $this->model->rak_buku_dt()->with('m_rak_buku_dt')->get();
        $data = $this->model->rak_buku_dt()->get();
        return view('backend_view.master.rak_buku.rak_buku_index', compact('data'));
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'kode_dt' => 'required',
        ]);
        $id = $this->model->rak_buku_dt()->max('mrbd_dt') + 1;
        $id = $this->model->rak_buku_dt()->max('mrbd_id') + 1;
        if ($validasi == true) {    
            $this->model->rak_buku_dt()->create([
                'mrbd_dt' => $id,
                'mrbd_id' => 'mrb_id',
                'mrbd_kode' => $req->kode_dt,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
}