<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerbit extends model
{
  protected $table = 'm_penerbit';
  protected $primaryKey = 'mpn_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'mpn_id',
    'mpn_name',
    'mpn_alamat',
    'mpn_tlp',
  ];

  public function getDateFormat()
  {
    return 'Y-m-d H:i:s';
  }
  public function buku()
    {
      return $this->hasMany('App\buku', 'mb_penerbit', 'mpn_id');
    }

}
