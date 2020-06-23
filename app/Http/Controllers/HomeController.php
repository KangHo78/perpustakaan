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
        $pengembalian = $this->calculatepengembalian();
        $total_user = $this->model->user()->count();
        $total_buku = $this->model->buku_dt()->count();
        $total_buku_dipinjam = $this->model->buku_dt()->where('mbdt_status', 'TERPINJAM')->count();
        $total_buku_terpinjam = $this->model->log()->where('log_feature', 'PEMINJAMAN')->where('log_action', 'CREATE')->count();
        return view('home', compact('total_user', 'total_buku', 'total_buku_dipinjam', 'total_buku_terpinjam', 'idcard', 'pengembalian'));
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
    public function calculatepengembalian()
    {
        $date = date("Y-m-d");
        $data =  $this->model->buku_dt()->join('t_peminjaman_dt', 'm_buku_dt.mbdt_isbn', '=', 't_peminjaman_dt.tpjdt_isbn')
            ->join('t_peminjaman', 't_peminjaman_dt.tpjdt_id', '=', 't_peminjaman.tpj_id')
            ->where([
                ['mbdt_status', '=', 'TERPINJAM'],
                ['tpj_anggota', '=', Auth::user()->id]
            ])->first();
        if ($data != null) {
            $kembali = strtotime($data->tpj_date_kembali);
            $tempo = date('Y-m-d', strtotime($data->tpj_date_tempo . ' +1 week'));
            $datekembali = floor(($kembali - strtotime($date)) / 60 / 60 / 24);
            if ($datekembali <= 7) {
                return 'Buku yang Anda pinjam kurang dari ' . $datekembali .
                    ' hari, segera lakukan pengembalian sebelum tanggal ' . $data->tpj_date_tempo;
            } elseif ($date <= $tempo) {
                return 'Buku yang Anda pinjam telah melewati tanggal tempo ' . $data->tpj_date_tempo .
                    ' dimohon segera mengembalikan buku yang anda pinjam dan membayar denda.';
            }
        }
    }
}
