<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $table = "events";

    public function requests(){
        return $this->hasMany('App\Models\EventRequest','event_id');
    }

}
