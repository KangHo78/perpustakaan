<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

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
    public function index()
    {
        if (Auth::user()->registration_kode == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else if (Auth::user()->username == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else {
            return view('backend_view.master.user.profile.profile_forgot');
        }
    }
    public function changepassword(Request $req)
    {
        $validasi = $this->validate($req, [
            'reg' => 'required',
            'email' => 'required',
            'kode' => 'required',
            'username' => 'required',
            'password' => ['required', 'min:8'],
        ]);

        $reg = Auth::user()->registration_kode != $req->reg;
        $email = Auth::user()->email != $req->email;
        $kode = Auth::user()->kode != $req->kode;
        $username = Auth::user()->username != $req->username;

        if ($validasi == true) {
            if ($reg || $email || $kode || $username) {
                return Response()->json(['status' => 'gagal']);
            } else {
                $this->model->user()->where('id', $req->id)->update([
                    'registration_kode' => $req->reg,
                    'email' => $req->email,
                    'kode' => $req->kode,
                    'username' => $req->username,
                    'password' => Hash::make($req->password),
                ]);
                return Response()->json(['status' => 'sukses']);
            }
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
