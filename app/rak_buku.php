<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak_buku extends model
{
    protected $table = 'm_rak_buku';
    protected $primaryKey = 'mrb_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'mrb_id',
                            'mrb_kode',
                            'mrb_name',
                            'mrb_lokasi_rak',
                          ];

    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 
    public function rak_buku_dt()
  {
      return $this->hasMany('App\rak_buku_dt', 'mrbd_id', 'mrb_id');
  }

}