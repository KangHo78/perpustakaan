<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengarang extends model
{
  protected $table = 'm_pengarang';
  protected $primaryKey = 'mpg_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'mpg_id',
    'mpg_name',
    'mpg_alamat',
    'mpg_tlp',
  ];

  public function getDateFormat()
  {
    return 'Y-m-d H:i:s';
  }
}
