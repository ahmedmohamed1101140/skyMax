<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashType extends Model
{
    protected $table = "cash_type";

    //
    public function sender(){
        return $this->belongsTo(Client::class,'client_sender');
    }
    public function receiver(){
        return $this->belongsTo(Client::class,'customer_id');
    }
}
