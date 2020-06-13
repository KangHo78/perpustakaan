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
        return view('backend_view.master.user.user_index', compact('data'));
    }
    public function edit(Request $req)
    {
        $data = $this->model->user()->where('id', $req->id)->first();
        return view('backend_view.master.user.user_edit', compact('data'));
    }
    public function update(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
            'username' => 'required',
            'address' => 'required'
        ]);
        if ($validasi == true) {
            $this->model->user()->where('id', $req->id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'previleges' => $req->previleges,
                'kode' => $req->kode,
                'address_univ' => $req->addressuniv,
                'address' => $req->address,
                'tlp' => $req->tlp,
                'registration_kode' => $req->reg,
                'username' => $req->username,
            ]);
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function hapus(Request $req)
    {
        DB::table('users')->where('id', $req->id)->delete();
        return redirect()->back();
    }
    public function profile()
    {
        $data = $this->model->user()->get();
        return view('backend_view.master.user.profile.profile_index', compact('data'));
    }
}
