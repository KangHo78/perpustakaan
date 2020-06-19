<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\models;

use Auth;

class HomeController extends Controller
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
        $total_user = $this->model->user()->count();
        $total_buku = $this->model->buku_dt()->count();
        $total_buku_dipinjam = $this->model->buku_dt()->where('mbdt_status','TERPINJAM')->count();
        $total_buku_terpinjam = $this->model->log()->where('log_feature','PEMINJAMAN')->where('log_action','CREATE')->count();
        return view('home',compact('total_user','total_buku','total_buku_dipinjam','total_buku_terpinjam'));
    }
}
