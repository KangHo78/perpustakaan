<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id', 'previleges', 'kode', 'address_univ', 'address', 'tlp', 'photo', 'registration_kode', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function previleges()
    {
        return $this->belongsTo('App\previleges', 'previleges', 'mp_id');
    }
    public function peminjaman_anggota()
    {
      return $this->hasMany('App\peminjaman', 'tpj_anggota', 'id');
    }
    public function peminjaman_staff()
    { 
      return $this->hasMany('App\peminjaman', 'tpj_staff', 'id');
    }
}
