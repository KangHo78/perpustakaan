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
        $idcard = $this->calculateid();
        $total_user = $this->model->user()->count();
        $total_buku = $this->model->buku_dt()->count();
        $total_buku_dipinjam = $this->model->buku_dt()->where('mbdt_status', 'TERPINJAM')->count();
        $total_buku_terpinjam = $this->model->log()->where('log_feature', 'PEMINJAMAN')->where('log_action', 'CREATE')->count();
        return view('home', compact('total_user', 'total_buku', 'total_buku_dipinjam', 'total_buku_terpinjam', 'idcard'));
    }
    public function calculateid()
    {
        $dateid = strtotime("+1 month", strtotime(Auth::user()->updated_at));
        $dateuser = strtotime(date("Y-m-d H:i:s"));
        $date = floor(($dateid - $dateuser) / 60 / 60 / 24);
        if ($date <= 30) {
            return 'Hallo ' . Auth::user()->name .
                ' masa berlaku ID Card Anda kurang dari ' . $date .
                ' hari, silahkan melakukan perpanjangan.';
        }
    }
}
