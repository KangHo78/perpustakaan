<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\previleges;
use App\penerbit;
use App\pengarang;
use App\kategori;
use App\buku;
use App\buku_dt;
use App\rak_buku;
use App\peminjaman;
use App\peminjaman_dt;

class models extends model
{
    public function user()
    {
      $user = new User(); 

      return $user;
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
}
