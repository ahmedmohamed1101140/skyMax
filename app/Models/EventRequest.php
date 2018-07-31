<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    //
    protected $table = 'events_requests';

    public function client(){
        return $this->belongsTo('App\Models\Client','user_id');
    }

    public function event(){
        return $this->belongsTo('App\Models\Events','event_id');
    }
}
