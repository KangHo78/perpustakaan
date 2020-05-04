<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\previleges;
use App\penerbit;
use App\pengarang;
use App\kategori;
use App\rak_buku;

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
}
