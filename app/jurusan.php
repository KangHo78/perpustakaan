<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends model
{
  protected $table = 'm_jurusan';
  protected $primaryKey = 'mj_id';
  public $remember_token = false;
  public $timestamps = false;
  const UPDATED_AT = 'updated_at';
  const CREATED_AT = 'created_at';

  protected $fillable = [
    'mj_id',
    'mj_kode',
    'mj_name',
    'mj_fakultas',
  ];
  public function user()
  {
    return $this->hasMany('App\User', 'jurusan', 'mf_id');
  }
  public function fakultas()
  {
    return $this->belongsTo('App\fakultas', 'mj_fakultas', 'mf_id');
  }
  public function getDateFormat()
  {
    return 'Y-m-d H:i:s';
  }
}
