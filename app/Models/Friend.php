<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected $table = 'friends';

    public function messages(){
        return $this->hasMany('App\Models\chatMessages','conv_id','conv_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client','user_id');
    }

    public function friend(){
        return $this->belongsTo('App\Models\Client','friend_id');
    }

}
