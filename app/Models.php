<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\previleges;

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
}
