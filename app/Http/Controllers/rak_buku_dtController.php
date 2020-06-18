<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak_buku extends model
{
    protected $table = 'm_rak_buku_dt';
    protected $primaryKey = 'mrbd_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'mrbd_id',
                            'mrb_id',
                            'mrbd_kode',
                          ];

    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 

}