<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku_katalog extends model
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
    'mb_name' ,
    'mb_desc' ,
    'mb_pinjam' ,
  ];

  public function getDateFormat()
  {
      return 'Y-m-d H:i:s';
  } 
   public function pengarang()
  {
      return $this->belongsTo('App\pengarang', 'mb_pengarang', 'mpg_id');
  }
}
