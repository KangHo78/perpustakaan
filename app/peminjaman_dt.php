<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman_dt extends model
{
  protected $table = 't_peminjaman_dt';
  protected $primaryKey = 'tpjdt_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'tpjdt_id'  ,
    'tpjdt_dt'  ,
    'tpjdt_buku' ,
    'tpjdt_isbn' ,
  ];

  public function getDateFormat()
  {
    return 'Y-m-d H:i:s';
  }
}
