<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    protected $table = "epin";

    //

    public function sender(){
        return $this->belongsTo(Client::class,'id_sender');
    }
    public function receiver(){
        return $this->belongsTo(Client::class,'id_client');
    }
}
