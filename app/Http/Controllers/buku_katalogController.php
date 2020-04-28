<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
class buku_katalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buku_katalog()
    {   
        return view('frontend_view.katalog.buku_katalog');
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
