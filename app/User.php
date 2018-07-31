<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "client";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'sname',
        'lname',
        'mail' ,
        'username' ,
        'phone' ,
        'address' ,
        'state',
        'country' ,
        'city' ,
        'Nationaid',
        'dateofbirth',
        'statics_date',
        'beneficiary',
        'relation',
        'usercode',
        'activation',
        'e_pin_balance',
        'e_money_balance',
        'static_date',
        'date',
        'active',
        'renew_date',
        'view',
        'id_add',
        'parent_id',
        'code_count',
        'pleft',
        'pright',
        'text_password',
        'epin',
        'emoney',
        'pincode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
        return $this->hasMany('App\Models\Basket','client_id');
    }

    public function events(){
        return $this->hasMany('App\Models\EventRequests','user_id');
    }

    public function products(){
        $this->belongsToMany('App\Models\Product','basket0','prod_id');
    }

    public function friends(){
        return $this->hasMany('App\Models\Friend','user_id');
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


//    public function status()
//    {
//        return $this->belongsTo(User_status::class, 'user_status_id');
//    }
//
//    public function wallet()
//    {
//        return $this->hasMany(Wallet::class, 'user_id');
//    }
//
//    public function addresses()
//    {
//        return $this->hasMany(User_address::class, 'user_id');
//    }
//
//    public function getLeftDownLineAttribute()
//    {
//        $user = User::where('parent_id', $this->unique_id)
//            ->where('position', 1)->first();
//        return $user;
//    }
//
//    public function getRightDownLineAttribute()
//    {
//        $user = User::where('parent_id', $this->unique_id)
//            ->where('position', 2)->first();
//        return $user;
//    }


}
