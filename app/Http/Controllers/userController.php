<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Hash;

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
    public function create()
    {
        $previlege = $this->model->previleges()->get();
        $fakultas = $this->model->fakultas()->get();
        $jurusan = $this->model->previleges()->get();
        return view('backend_view.master.user.user_create', compact('previlege', 'fakultas', 'jurusan'));
    }
    public function save(Request $req)
    {
        $id = $this->model->user()->max('id') + 1;
        if ($req->previleges != '1') {
            $validasi = $this->validate($req, [
                'name' => 'required',
                'email' => 'required',
                'password' => ['required', 'min:8'],
                'previleges' => 'required',
                'address' => 'required',
                'addressuniv' => 'required',
                'reg' => 'required',
                'tlp' => 'required',
                'username' => 'required',
            ]);
        } else {
            $validasi = $this->validate($req, [
                'name' => 'required',
                'email' => 'required',
                'password' => ['required', 'min:8'],
                'previleges' => 'required',
                'address' => 'required',
                'addressuniv' => 'required',
                'reg' => 'required',
                'tlp' => 'required',
                'username' => 'required',
                'fakultas' => 'required',
                'jurusan' => 'required',
            ]);
        }

        if ($req->previleges == '1') {
            $kode = $this->kodeadm();
        } else if ($req->previleges == '2') {
            $kode =  $this->kodedsn();
        } else {
            $kode =  $this->kodemhs();
        }
        if ($validasi == true) {
            $this->model->user()->create([
                'id' => $id,
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'previleges' => $req->previleges,
                'kode' => $kode,
                'address' => $req->address,
                'address_univ' => $req->addressuniv,
                'registration_kode' => $req->reg,
                'tlp' => $req->tlp,
                'username' => $req->username,
                'photo' => 'default.svg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s", strtotime("+4 years")),
            ]);
            return Response()->json(['status' => 'sukses']);
        }
    }
    public function edit(Request $req)
    {
        $data = $this->model->user()->where('id', $req->id)->first();
        $previlege = $this->model->previleges()->get();
        return view('backend_view.master.user.user_edit', compact('data', 'previlege'));
    }
    public function update(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'previleges' => 'required',
            'addressuniv' => 'required',
            'address' => 'required',
            'tlp' => 'required',
            'reg' => 'required',
            'username' => 'required',
        ]);
        if ($req->previleges == '1') {
            $kode = $this->kodeadm();
        } else if ($req->previleges == '2') {
            $kode =  $this->kodedsn();
        } else {
            $kode =  $this->kodemhs();
        }
        if ($validasi == true) {
            $this->model->user()->where('id', $req->id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'previleges' => $req->previleges,
                'kode' => $kode,
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
    public function perpanjang(Request $req)
    {
        $users = DB::table('users')->where('id', $req->id);
        $userdate = $users->first()->updated_at;
        $newdate = date("Y-m-d H:i:s", strtotime("+4 years", strtotime($userdate)));
        $users->update(['updated_at' => $newdate]);
        return redirect()->back();
    }
    public function profile()
    {
        $data = $this->model->user()->get();
        $user_aktif = $this->useraktif();
        return view('backend_view.master.user.profile.profile_index', compact('data', 'user_aktif'));
    }
    public function profileedit(Request $req)
    {
        $data = $this->model->user()->where('id', $req->id)->first();
        $fakultas = $this->model->fakultas()->get();
        $jurusan = $this->model->previleges()->get();
        return view('backend_view.master.user.profile.profile_edit', compact('data', 'fakultas', 'jurusan'));
    }
    public function profileupdate(Request $req)
    {
        $validasi = $this->validate($req, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2000',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tlp' => 'required',
            'reg' => 'required',
            'username' => 'required',
        ]);
        if ($req->hasFile('photo')) {
            $imagePath = $req->file('photo');
            $fileName =  $req->id . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move(public_path('storage/user'), $fileName);
        }
        if ($validasi == true) {
            $this->model->user()->where('id', $req->id)->update([
                'photo' => $fileName,
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'tlp' => $req->tlp,
                'registration_kode' => $req->reg,
                'username' => $req->username,
            ]);
            return Response()->json(['status' => 'sukses']);
        }
    }
    public function profileprint()
    {
        if (Auth::user()->username == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan sudah mengisi semua data diri']);
        } else {
            $pdf = PDF::loadView('backend_view.master.user.profile.profile_print');
            return $pdf->stream("ID Card " . Auth::user()->name . ".pdf", array("Attachment" => 0));
        }
    }
    public function kodemhs()
    {
        $count = $this->model->user()->where('kode', 'like', 'MHS%')->count();
        $date = date("ym");
        $newcount = str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $kode = 'MHS/' . $date . "/" . $newcount;
        return $kode;
    }
    public function kodedsn()
    {
        $count = $this->model->user()->where('kode', 'like', 'DSN%')->count();
        $date = date("ym");
        $newcount = str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $kode = 'DSN/' . $date . "/" . $newcount;
        return $kode;
    }
    public function kodeadm()
    {
        $count = $this->model->user()->where('kode', 'like', 'ADM%')->count();
        $date = date("ym");
        $newcount = str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $kode = 'ADM/' . $date . "/" . $newcount;
        return $kode;
    }
    public function useraktif()
    {
        $yearnow = date("Y");
        $peminjaman =  $this->model->log()->where([
            ['log_created_at', 'like', $yearnow . '%'],
            ['log_user', 'like', Auth::user()->id],
            ['log_feature', 'like', 'PEMINJAMAN']
        ])->count();
        if ($peminjaman >= 10) {
            return 'A';
        } else {
            return 'T';
        }
    }
}
