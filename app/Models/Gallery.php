<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = "gallery";

    public function product(){
        return $this->belongsTo('App\Models\Product','prod_id');
    }

}
