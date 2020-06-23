<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku_dt extends model
{
  protected $table = 'm_buku_dt';
  protected $primaryKey = 'mbdt_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'mbdt_id',
    'mbdt_dt',
    'mbdt_isbn',
    'mbdt_status',
    'mbdt_rak_buku_dt',
    'mbdt_kondisi',
  ];

  public function getDateFormat()
  {
      return 'Y-m-d H:i:s';
  }
  public function peminjaman_dt()
  {
      return $this->hasMany('App\peminjaman_dt', 'tpjdt_isbn', 'mbdt_id');
  }
  public function pengembalian_dt()
  {
      return $this->hasMany('App\pengembalian_dt', 'tpgdt_isbn', 'mbdt_id');
  }
  public function buku()
  {
      return $this->belongsTo('App\buku', 'mbdt_id', 'mb_id');
  }

}
