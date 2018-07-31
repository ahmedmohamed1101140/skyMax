<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMessage extends Model
{
    //
    protected $table = "client_message";

    public function sender(){
        return $this->belongsTo('App\Models\Client','client_sender_id');
    }

    public function receveir(){
        return $this->belongsTo('App\Models\Client','client_recevier_id');
    }

}
