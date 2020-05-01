<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class models extends model
{
    public function user()
    {
      $user = new User(); 

      return $user;
    }
}
