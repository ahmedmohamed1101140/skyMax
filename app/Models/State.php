<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = "states";

    public function country(){
        return $this->belongsTo('App\Models\City','country_id');
    }

}