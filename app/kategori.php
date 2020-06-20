<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends model
{
    protected $table = 'm_kategori';
    protected $primaryKey = 'mk_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'mk_id',
                            'mk_name',
                          ];

    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 
   public function buku()
    {
      return $this->hasMany('App\buku', 'mb_kategori', 'mk_id');
    }

}