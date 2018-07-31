<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = "client";

    public function orders(){
        return $this->hasMany('App\Models\Basket');
    }

    public function products(){
        $this->belongsToMany('App\Models\Product','basket0','prod_id');
    }

    public function immediateChildAccounts(){
        return $this->hasMany('App\Models\Client','parent_id','id');
    }

    public function parentAccount(){
        $this->belongsTo('Client','parent_id','id');
    }

    public function allChildAccounts()
    {
        $childAccounts = $this->immediateChildAccounts;
        if (empty($childAccounts))
            return $childAccounts;

        foreach ($childAccounts as $child)
        {
            $child->load('immediateChildAccounts');
            $childAccounts = $childAccounts->merge($child->allChildAccounts());
        }

        return $childAccounts;
    }

}
