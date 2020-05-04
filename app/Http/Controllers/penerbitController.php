<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
class penerbitController extends Controller
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
        $data = $this->model->penerbit()->get();
        return view('backend_view.master.penerbit.penerbit_index',compact('data'));
    }
    public function create()
    {
        return view('backend_view.master.penerbit.penerbit_create');
    }
    public function save(Request $req)
    {
        $id = $this->model->penerbit()->max('mpn_id')+1;
        $simpan = $this->model->penerbit()->create([
                    'mpn_id'=>$id,
                    'mpn_name'=>$req->name,
                    'mpn_kode'=>$req->kode,
                    'mpn_alamat'=>$req->alamat,
                    'mpn_tlp'=>$req->tlp,
                  ]);
        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->penerbit()->where('mpn_id',$req->id)->first();
        return view('backend_view.master.penerbit.penerbit_edit',compact('data'));
    }
    public function update(Request $req)
    {
        $simpan = $this->model->penerbit()->where('mpn_id',$req->id)->update([
                    'mpn_name'=>$req->name,
                    'mpn_kode'=>$req->kode,
                    'mpn_alamat'=>$req->alamat,
                    'mpn_tlp'=>$req->tlp,
                  ]);

        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $data = $this->model->penerbit()->where('mpn_id',$req->id)->delete();
        return redirect()->back();
    }
}
