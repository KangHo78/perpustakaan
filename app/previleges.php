<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class previleges extends model
{
    protected $table = 'm_previleges';
    protected $primaryKey = 'mp_id';
    public $remember_token = false;
    public $timestamps = false;
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    
    protected $fillable = [
                            'mp_id',
                            'mp_name',
                          ];

    public function user(){
      return $this->hasMany('App\User', 'previleges', 'mp_id');
    } 
    public function getDateFormat()
    {
      return 'Y-m-d H:i:s';
    } 

}