<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\fakultas;
use App\previleges;
use App\penerbit;
use App\pengarang;
use App\kategori;
use App\buku;
use App\buku_dt;
use App\rak_buku;
use App\peminjaman;
use App\peminjaman_dt;
use App\pengembalian;
use App\pengembalian_dt;
use App\rak_buku_dt;
use App\log;

class models extends model
{
  public function user()
  {
    $user = new User();

    return $user;
  }

  public function fakultas()
  {
    $fakultas = new fakultas();

    return $fakultas;
  }

  public function previleges()
  {
    $previleges = new previleges();

    return $previleges;
  }

  public function buku()
  {
    $buku = new buku();

    return $buku;
  }
  public function buku_dt()
  {
    $buku_dt = new buku_dt();

    return $buku_dt;
  }

  public function penerbit()
  {
    $penerbit = new penerbit();

    return $penerbit;
  }
  public function pengarang()
  {
    $pengarang = new pengarang();

    return $pengarang;
  }
  public function kategori()
  {
    $kategori = new kategori();

    return $kategori;
  }
  public function rak_buku()
  {
    $rak_buku = new rak_buku();

    return $rak_buku;
  }
  public function rak_buku_dt()
  {
    $rak_buku_dt = new rak_buku_dt();

    return $rak_buku_dt;
  }
  public function peminjaman()
  {
    $peminjaman = new peminjaman();

    return $peminjaman;
  }
  public function peminjaman_dt()
  {
    $peminjaman_dt = new peminjaman_dt();

    return $peminjaman_dt;
  }
  public function pengembalian()
  {
    $pengembalian = new pengembalian();

    return $pengembalian;
  }
  public function pengembalian_dt()
  {
    $pengembalian_dt = new pengembalian_dt();

    return $pengembalian_dt;
  }
  public function log()
  {
    $log = new log();

    return $log;
  }
  public function user()
  {
    $user = new User();

    return $user;
  }

  public function fakultas()
  {
    $fakultas = new fakultas();

    return $fakultas;
  }

  public function previleges()
  {
    $previleges = new previleges();

    return $previleges;
  }

  public function buku()
  {
    $buku = new buku();

    return $buku;
  }
  public function buku_dt()
  {
    $buku_dt = new buku_dt();

    return $buku_dt;
  }

  public function buku_katalog()
  {
    $buku_katalog = new buku_katalog();

    return $buku_katalog;
  }

  public function penerbit()
  {
    $penerbit = new penerbit();

    return $penerbit;
  }
  public function pengarang()
  {
    $pengarang = new pengarang();

    return $pengarang;
  }
  public function kategori()
  {
    $kategori = new kategori();

    return $kategori;
  }
  public function rak_buku()
  {
    $rak_buku = new rak_buku();

    return $rak_buku;
  }
  public function rak_buku_dt()
  {
    $rak_buku_dt = new rak_buku_dt();

    return $rak_buku_dt;
  }
  public function peminjaman()
  {
    $peminjaman = new peminjaman();

    return $peminjaman;
  }
  public function peminjaman_dt()
  {
    $peminjaman_dt = new peminjaman_dt();

    return $peminjaman_dt;
  }
  public function pengembalian()
  {
    $pengembalian = new pengembalian();

    return $pengembalian;
  }
  public function pengembalian_dt()
  {
    $pengembalian_dt = new pengembalian_dt();

    return $pengembalian_dt;
  }
  public function log()
  {
    $log = new log();

    return $log;
  }
}
