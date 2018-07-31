<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Country;
use App\Models\Epin;
use App\Models\NetworkSeting;
use App\Models\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function register_pin_transfer($user,$price){
        $wallet = new Epin();
        $wallet->id_sender = $user->id;
        $wallet->id_client = -1;
        $wallet->type = "post";
        $wallet->date = Carbon::now();
        $wallet->commission_type = "Register_new_account";
        $wallet->value = $price;
        $wallet->save();
    }


    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $bool = false;
        $states = State::all();
        $user = auth()->user();
        $children = $user->allChildAccounts();

        return view('site.team', compact('countries',
            'user',
            'categories',
            'states',
            'bool',
            'children'
        ));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        //validate the user input
        $this->validate($request,array(
            'user_id' => 'required',
            'name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',

            'country' => 'required',
            'state'   => 'required',
            'city'    => 'required',

            'position' => 'required',
            'address'  => 'required',
            'Nationaid' => 'required',

            'phone'    => 'required',
            'username' => 'required',
            'mail' => 'required',

            'beneficiary' => 'required',
            'relation' => 'required',

            'password' => 'required',
            'inside_password' => 'required'
        ));


        $nextyear = Carbon::now()->addYear();
        //find the parent of the user
        $parent = User::all()->where('id', '=',$request->user_id)->first();
        $main_data = NetworkSeting::all()->first();


        if(auth()->user()->epin >= $main_data->account_price){
            if ($parent) {
                $user = new User([
                    'fname' => $data['name'],
                    'sname' => $data['middle_name'],
                    'lname' => $data['last_name'],

                    'mail' => $data['mail'],
                    'username' => $data['username'],
                    'phone' => $data['phone'],
                    'address'  => $data['address'],

                    'state' => State::where('id',$data['state'])->first()->name_eng,
                    'country' => Country::where('id',$data['country'])->first()->name,
                    'city' => $data['city'],
                    'dateofbirth' => $data['birth_date'],
                    'text_password' => $data['password'],

                    'Nationaid' => $data['Nationaid'],
                    'beneficiary' => $data['beneficiary'],
                    'relation' => $data['relation'],

                    'usercode' => 'EG'.Carbon::now()->timestamp,
                    'parent_id' => $parent->id,
                    'id_add' => auth()->user()->id,

                    'epin' => 0,
                    'emoney' => 0,
                    'statics_date' => Carbon::now(),
                    'date' => Carbon::now(),
                    'activation' => 0,
                    'view' => '1',

                    'renew_date' => $nextyear,
                    'pincode' => $data['inside_password'],
                ]);
                $user->password = Hash::make($data['password']);

                $children = Client::all()->where('parent_id','=',$parent->id);
                if($children->count() == 0){
                    if($data['position'] == 1){
                        $user->pleft = '1';
                        $user->code_count = $parent->code_count.'2';
                    }
                    else if($data['position'] == 2){
                        $user->pright ='1';
                        $user->code_count = $parent->code_count.'1';
                    }
                }
                elseif ($children->count() == 1){
                    if($data['position'] == 1 && substr($children->first()->code_count,-1) == '1' ){
                        $user->pleft = '1';
                        $user->code_count = $parent->code_count.'2';
                    }
                    else if($data['position'] == 2 && substr($children->first()->code_count,-1) == '2'){
                        $user->pright = '1';
                        $user->code_count = $parent->code_count.'1';
                    }
                    else{
                        if($request->ar = 'ar'){
                            session()->flash('error','لا يمكنك اضافه هذا العميل فى هذا المكان');
                            return redirect()->back();
                        }
                        else{
                            session()->flash('error','Wrong Tree Position');
                            return redirect()->back();
                        }

                    }
                }
                else{
                    if($request->ar == 'ar'){
                        session()->flash('error',"لقد وصل هذا العميل للحد الاعلى من الابناء");
                        return redirect()->back();
                    }
                    else{
                        session()->flash('error',"Max Child Could'nt Create This User");
                        return redirect()->back();
                    }

                }

                $this->find_all_parents($user);

                $user->save();
                $this->register_pin_transfer(auth()->user(),$main_data->account_price);
                auth()->user()->epin -= $main_data->account_price;
                auth()->user()->save();
                if($request->ar == 'ar'){
                    session()->flash('message',"تم إضافه العضو الجديد بنجاح");
                }
                else{
                    session()->flash('message',"User Added Successfully");
                }
                return redirect()->back();
            }
            else {
                if($request->ar == 'ar'){
                    session()->flash('error',"خطأ فى إيجاد الأب");
                    return redirect()->back();
                }
                else{
                    session()->flash('error',"Parent Not Found");
                    return redirect()->back();
                }
            }
        }
        else{
            if($request->ar = 'ar'){
                session()->flash('error',"ليس لديك الرصيد الكاف لإضافه هذا العضو");
                return redirect()->back();
            }
            else{
                session()->flash('error',"You Don't Have Enough Balance To Add New Users");
                return redirect()->back();
            }
        }
    }

    public function find_user(Request $request){
        $countries = Country::all();
        $categories = Category::all();
        $states = State::all();
        $user = auth()->user();
        $client = null;
        $children = null;
        $client = Client::where('usercode','=',$request->user_id)->first();
        if($client !== null){
            if($this->check_code_count($user,$client)){
                $bool = true;
                $children = $client->allChildAccounts();
                session()->flash('message','Client Tree Found');
                return view('site.team',compact('user','bool','countries','categories', 'states','children','client'));
            }
            else{
                if($request->ar == 'ar'){
                    session()->flash('error',"الابناء فقط");
                    return redirect(url('/ar/team'));
                }
                else{
                    session()->flash('error',"children Only Process");
                    return redirect(url('/team'));
                }
            }
        }
        else{
            if($request->ar == 'ar'){
                session()->flash('error','لم نتمكن من إيجاد المستخدم');
                return redirect(url('/ar/team'));
            }
            else{
                session()->flash('error','Client Not Found');
                return redirect(url('/team'));
            }
        }
    }

    public function find_all_parents($user){
        $position = substr($user->code_count,strlen($user->code_count)-1,1);
        for ($i=1 ; $i<strlen($user->code_count) ; $i++){
            $client = Client::all()->where('code_count','=',substr($user->code_count,0,(strlen($user->code_count)-$i)))->first();
            if($client){
                if($position == '1'){
                    $client->allcom_right++;
                }
                elseif ($position == '2'){
                    $client->allcom_left++;
                }
                $client->save();
                $position = substr($client->code_count,strlen($client->code_count)-1,1);
            }
            else{
                session()->flash('error',"Sorry Error Happen Try Again");
                return redirect()->back();
            }
        }
    }

    public function check_code_count($auth_user,$user){
        $code1 = $auth_user->code_count;
        $code2 = $user->code_count;


        if(strlen($code1) > strlen($code2)){
            if($code2 == substr($code1,0,strlen($code2))){
                return false;
//                dd("Parent Match");
            }
            else{
                return false;
//                dd('parent Dis match');
            }
        }
        elseif (strlen($code2) > strlen($code1)){
            if($code1 == substr($code2,0,strlen($code1))){
                return true;
//                dd("Child Match");
            }
            else{
                return false;
//                dd('Child Dis match');
            }
        }
        elseif (strlen($code1) == strlen($code2)){
            return false;
//            dd("can't send to user in same level");
        }
        return false;
    }

}
