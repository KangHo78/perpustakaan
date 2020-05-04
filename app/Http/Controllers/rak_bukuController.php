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
        $id = $this->model->penerbit()->max('mp_id')+1;
        $simpan = $this->model->penerbit()->create([
                    'mp_id'=>$id,
                    'mp_name'=>$req->name,
                    'mn_alamat'=>$req->alamat,
                    'mn_tlp'=>$req->tlp,
                  ]);
        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->penerbit()->where('mp_id',$req->id)->first();
        return view('backend_view.master.penerbit.penerbit_edit',compact('data'));
    }
    public function update(Request $req)
    {
        $simpan = $this->model->penerbit()->where('mp_id',$req->id)->update([
                    'mp_name'=>$req->name,
                  ]);

        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        $data = DB::table('latihan_crud')->where('id',$req->id)->delete();
        return redirect()->back();
    }
}
