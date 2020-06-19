<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        return view('backend_view.master.user.user_create', compact('previlege'));
    }
    public function save(Request $req)
    {
        $validasi = $this->validate($req, [
            'name' => 'required',
        ]);
        // $id = $this->model->kategori()->max('mk_id') + 1;
        // if ($validasi == true) {
        //     $this->model->kategori()->create([
        //         'mk_id' => $id,
        //         'mk_name' => $req->name,
        //     ]);
        //     return Response()->json(['status' => 'sukses']);
        // } else {
        //     return Response()->json(['status' => 'gagal']);
        // }
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
            'kode' => 'required',
            'addressuniv' => 'required',
            'address' => 'required',
            'tlp' => 'required',
            'reg' => 'required',
            'username' => 'required',
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
    public function profileedit(Request $req)
    {
        $data = $this->model->user()->where('id', $req->id)->first();
        return view('backend_view.master.user.profile.profile_edit', compact('data'));
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
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    public function profileprint()
    {
        $userdate = strtotime("+4 years", strtotime(Auth::user()->updated_at));
        $date = date("Y-m-d", $userdate);
        if (Auth::user()->registration_kode == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else if (Auth::user()->username == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else if (Auth::user()->address == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else if (Auth::user()->tlp == null) {
            return redirect()->route('profile_index')->with(['status' => 'Pastikan Sudah Mengisi Semua Data Diri']);
        } else {
            $pdf = PDF::loadView('backend_view.master.user.profile.profile_print', ['date' => $date]);
            return $pdf->stream("ID Card " . Auth::user()->name . ".pdf", array("Attachment" => 0));
        }
    }
}
