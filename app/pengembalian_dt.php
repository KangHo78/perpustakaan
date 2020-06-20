<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian_dt extends model
{
  protected $table = 't_pengembalian_dt';
  protected $primaryKey = 'tpgdt_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'tpgdt_id'  ,
    'tpgdt_dt'  ,
    'tpgdt_isbn' ,
    'tpgdt_kondisi' ,
  ];

  public function getDateFormat()
  {
      return 'Y-m-d H:i:s';
  }
  public function pengembalian()
  {
      return $this->belongsTo('App\pengembalian', 'tpg_id', 'tpgdt_id');
  }
  public function buku_dt()
  {
      return $this->belongsTo('App\buku_dt', 'tpgdt_isbn', 'mbdt_isbn');
  }
}
