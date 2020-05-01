<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Response;
class userController extends Controller
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
        $data = $this->model->user()->get();
        return view('backend_view.master.user.user_index',compact('data'));
    }
    public function create()
    {
        return view('latihan_crud_create');
    }
    public function save(Request $req)
    {
        $simpan = DB::table('latihan_crud')->insert([
                    'nama'=>$req->nama,
                    'kelas'=>$req->kelas,
                  ]);
        if ($simpan == true) {
            return Response()->json(['status'=>'sukses']);
        }else{
            return Response()->json(['status'=>'gagal']);
        }
    }
    public function edit(Request $req)
    {
        $data = DB::table('latihan_crud')->where('id',$req->id)->first();
        return view('latihan_crud_edit',compact('data'));
    }
    public function update(Request $req)
    {
        $simpan = DB::table('latihan_crud')->where('id',$req->id)->update([
                    'nama'=>$req->nama,
                    'kelas'=>$req->kelas,
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
