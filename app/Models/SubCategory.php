<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $table = "subcategory";

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }

}
