<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends model
{
    protected $table = 'log_history';
    protected $primaryKey = 'log_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'log_id',
                            'log_name',
                            'log_kode',
                            'log_user',
                            'log_feature',
                            'log_action',
                            'log_created_by',
                            'log_created_at',
                          ];

    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 

}