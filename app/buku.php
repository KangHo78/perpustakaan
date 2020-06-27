<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends model
{
  protected $table = 'm_buku';
  protected $primaryKey = 'mb_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'mb_id' ,
    'mb_kode' ,
    'mb_kategori' ,
    'mb_penerbit' ,
    'mb_pengarang' ,
    'mb_created_by' ,
    'mb_created_at' ,
    'mb_image' ,
    'mb_name' ,
    'mb_desc' ,
    'mb_pinjam' ,
  ];

  public function getDateFormat()
  {
      return 'Y-m-d H:i:s';
  }
  public function created_by()
  {
      return $this->belongsTo('App\User', 'mb_created_by', 'id');
  }
  public function buku_dt()
  {
      return $this->hasMany('App\buku_dt', 'mbdt_id', 'mb_id');
  }
  public function kategori()
  {
      return $this->belongsTo('App\kategori', 'mb_kategori', 'mk_id');
  }
  public function penerbit()
  {
      return $this->belongsTo('App\penerbit', 'mb_penerbit', 'mpn_id');
  }
  public function pengarang()
  {
      return $this->belongsTo('App\pengarang', 'mb_pengarang', 'mpg_id');
  }
  public function rak_buku()
  {
      return $this->belongsTo('App\rak_buku', 'mb_rak_buku', 'mrb_id');
  }
  public function rak_buku_dt()
  {
         return $this->belongsTo('App\rak_buku_dt', 'mrbd_dt', 'mrbd_id');
  }
}
