<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    //
    protected $table = "basket0";

    public function client(){
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','prod_id');
    }


}
