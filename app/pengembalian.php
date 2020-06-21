<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends model
{
  protected $table = 't_pengembalian';
  protected $primaryKey = 'tpg_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'tpg_id',
    'tpg_kode' ,
    'tpg_anggota',
    'tpg_staff',
    'tpg_date_kembali' ,
    'tpg_created_by' ,
    'tpg_created_at' ,
    'tpg_peminjaman' ,
  ];

  public function getDateFormat()
  {
    return 'Y-m-d H:i:s';
  }
  public function peminjaman()
  {
      return $this->belongsTo('App\peminjaman', 'tpg_peminjaman', 'tpj_id');
  }
  public function pengembalian_anggota()
  {
      return $this->belongsTo('App\User', 'tpg_anggota', 'id');
  }
  public function pengembalian_staff()
  {
      return $this->belongsTo('App\User', 'tpg_staff', 'id');
  }
  public function pengembalian_dt()
  {
      return $this->hasMany('App\pengembalian_dt', 'tpgdt_id', 'tpg_id');
  }
}
