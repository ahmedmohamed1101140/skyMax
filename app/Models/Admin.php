<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    use Notifiable;
    protected $guard = 'admin';
    protected $table = "admin";

    protected $fillable = [
        'mail','username','last_login','type','view'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne('App\Models\Role','id','type');
    }

}
