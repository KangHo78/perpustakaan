<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\models;
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
    public function profileprint()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // $data = [
        //     'title' => 'First PDF for Medium',
        //     'heading' => 'Hello from 99Points.info',
        //     'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
        // ];

        // $pdf = PDF::loadView('backend_view.master.user.profile.profile_index', $data);
        // return $pdf->stream('invoice.pdf');
        // $pdf = PDF::loadHTML('<h1>Test</h1>')->setPaper('catalog #10 1/2 envelope','portrait');
        // return $pdf->stream("invoice.pdf");
        // $pdf = PDF::loadHTML('<h1>Test</h1>');
        // return $pdf->stream("test.pdf");
        $data = $this->model->user()->get();
        // return view('backend_view.master.user.profile.profile_print');
        // $pdf = PDF::loadview('backend_view.master.user.profile.profile_index')->setOption('no-stop-slow-scripts', true);
        // return $pdf->download('memek.pdf');
        // $pdf = PDF::loadView('backend_view.master.user.profile.profile_index');
        // return $pdf->download('pdfview.pdf');
        // return View::make('backend_view.master.user.profile.profile_print');        
        // $pdf = PDF::loadHTML($this->convert_customer_data_to_html());
        // return $pdf->stream();
        $pdf = PDF::loadview('backend_view.master.user.profile.profile_print');
        return $pdf->stream();
    }
    function convert_customer_data_to_html()
    {
        $output = '
     <h3 align="center">Customer Data</h3>{{ Auth::user()->name  }}
     ';
        return $output;
    }
}
