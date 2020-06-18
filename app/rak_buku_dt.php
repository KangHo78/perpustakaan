<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak_buku_dt extends model
{
    protected $table = 'm_rak_buku_dt';
    protected $primaryKey = 'mrbd_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'mrbd_dt',
                            'mrbd_id',
                            'mrb_kode',
                          ];

    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 
    public function buku()
    {
      return $this->belongsTo('App\buku', 'mrbd_id', 'mrb_id');
    }
}