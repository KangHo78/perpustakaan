<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;

class pengarangController extends Controller
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
        $data = $this->model->pengarang()->get();
        return view('backend_view.master.pengarang.pengarang_index', compact('data'));
    }
    public function create()
    {
        return view('backend_view.master.pengarang.pengarang_create');
    }
    public function save(Request $req)
    {
        $id = $this->model->pengarang()->max('mpg_id') + 1;
        $simpan = $this->model->pengarang()->create([
            'mpg_id' => $id,
            'mpg_name' => $req->name,
            'mpg_alamat' => $req->alamat,
            'mpg_tlp' => $req->tlp,
        ]);
        if ($simpan == true) {
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->pengarang()->where('mpg_id', $req->id)->first();
        return view('backend_view.master.pengarang.pengarang_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $simpan = $this->model->pengarang()->where('mpg_id', $req->id)->update([
            'mpg_name' => $req->name,
            'mpg_alamat' => $req->alamat,
            'mpg_tlp' => $req->tlp,
        ]);

        if ($simpan == true) {
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $this->model->pengarang()->where('mpg_id', $req->id)->delete();
        return redirect()->back();
    }
}
