<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\models;
use Illuminate\Support\Facades\Auth;
use Response;
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
            'username' => 'required',
        ]);
        // $uploadFile = $req->file('image');

        //generate random filename and append original extension (eg: asddasada.jpg, asddasada.png)
        // $filename = $req->id . '.' . $uploadFile->extension();

        // storing path (Change it to your desired path in public folder)
        // $path = 'img/uploads';

        // Move file to public filder
        // $uploadFile->storeAs('../../public/' . $path, $filename);
        // $imagePath = $req->file('photo');
        // $imagePath = Storage::disk('local')->putFile('uploads', $req->file('photo'));

        // $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
        // $imagePath->move(public_path('images'), $imagePath->getClientOriginalName());
        // $path = Storage::putFile('images', $req->file('photo'));
        // Storage::putFile(
        //     'assets/user',
        //     $imagePath,
        // );
        // Storage::disk('local')->put('images/1/smalls' . '/' . $imageName, 'public');
        if ($validasi == true) {
            $this->model->user()->where('id', $req->id)->update([
                'photo' => $req->photo,
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'tlp' => $req->tlp,
                'username' => $req->username,
            ]);
            // $file = 'user' . $req->id . '.jpg';
            // Storage::put($file, file_get_contents($req->file('photo')));
            return Response()->json(['status' => 'sukses']);
        } else {
            return Response()->json(['status' => 'gagal']);
        }
    }
    function profileprint()
    {
        $userdate = strtotime("+4 years", strtotime(Auth::user()->updated_at));
        $date = date("Y-m-d", $userdate);
        $pdf = PDF::loadView('backend_view.master.user.profile.profile_print', ['date' => $date]);
        return $pdf->stream("ID Card " . Auth::user()->name . ".pdf", array("Attachment" => 0));
    }
}
