<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function sub_category(){
        return $this->belongsTo('App\Models\SubCategory','sub_id');
    }


    public function images(){
        return $this->hasMany('App\Models\gallery','prod_id');
    }

    public function videos(){
        return $this->hasMany('App\Models\Tot','prod_id');
    }



}
