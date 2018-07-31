<?php

namespace App\Http\Controllers\Admin;

use App\Models\CashType;
use App\Models\Client;
use App\Models\Country;
use App\Models\Epin;
use App\Models\Friend;
use App\Models\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::paginate(50);
        return view('admin.clients.index')->with('clients',$clients);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $countries = Country::all()->where('view','=','1');
        $states = State::all()->where('view','=','1');
        return view('admin.clients.create' ,compact('states','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request ,array(
            'fname'=>'required',
            'sname'=>'required',
            'lname'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'mail'=>'required',
            'password'=>'required',
            'inside_password'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'beneficiary'=>'required',
            'relation'=>'required',
            'status'=>'required',
            'image_url'=>'required',
            'dateofbirth'=>'required',
            'view'=>'required',

        ));

        //check the username and generate the usercode
        $client = Client::all()->where('username','=',$request->username)->first();
        if($client){
            dd('Duplicate UserName');
            session()->flash('message','Username Taken Try new user name');
            return redirect()->back();
        }
        $usercode = 'EG'.Carbon::now()->timestamp;


//        dd($request->all());
        $client = new Client();
        $client->fname = $request->fname;
        $client->sname = $request->sname;
        $client->lname = $request->lname;
        $client->username = $request->username;
        $client->usercode = $usercode;
        $client->phone = $request->phone;
        $client->mail = $request->mail;
        $client->password = Hash::make($request->password);
        $client->text_password = $request->password;
        $client->pincode = $request->inside_password;
        $client->country = $request->country;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->beneficiary = $request->beneficiary;
        $client->relation = $request->relation;
        $client->activation = $request->status;
        $client->date = Carbon::now();
        $client->statics_date = Carbon::now();
        $client->dateofbirth = $request->dateofbirth;
        $client->view = $request->view;
        $client->activation_date = Carbon::now()->addYear();


        //upload image to server directory to service
        $dir = public_path().'/images/profile/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        $client->image = $fileName ;

        $client->save();

        session()->flash('message','Client Added successfully');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
        $client = Client::find($id);
        $children = $client->allChildAccounts();
        $friend = Friend::all()->where('friend_id','=','-1')->where('user_id','=',$id)->first();
        if($friend == null){
            $conv_id = Carbon::now()->timestamp;
            $friend = new Friend();
            $friend->user_id = $id;
            $friend->friend_id = -1;
            $friend->conv_id = $conv_id;
            $friend->save();
        }
        else{
            foreach ($friend->messages as $message){
                if($message->msg_from != '-1')
                $message->readed = 1;
                $message->save();
            }
        }


        $countries = Country::all()->where('view','=','1');
        $states = State::all()->where('view','=','1');

        $e_pins = Epin::all()->where('id_sender','=', $id);
        $e_moneys = CashType::all()->where('client_sender','=', $id);
        $e_pin1 = Epin::all()->where('id_client','=', $id);
        $e_money1 = CashType::all()->where('customer_id','=', $id);
        return view('admin.clients.show',compact('client','e_pin1','friend','e_money1','states','countries','children','e_pins','e_moneys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $client = Client::find($id);
        if($request->personal_info) {
//            $client->fname = $request->fname;
//            $client->sname = $request->sname;
//            $client->lname = $request->lname;
//            $client->name_family = $request->famname;
//            $client->Nationaid = $request->nation_id;
//
//            $client->username = $request->username;
//            $client->phone = $request->phone;
//            $client->mail = $request->mail;
//
//            $client->city = $request->city;
//            $client->address = $request->address;
//
//            $client->beneficiary = $request->beneficiary;
//            $client->relation = $request->relation;
//            if($request->image_url){
//                //upload image to server directory to service
//                $dir = public_path().'/images/profile/';
//                $file = $request->file('image_url') ;
//                $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
//                $file->move($dir , $fileName);
//                $client->image = $fileName ;
//            }
//            if($request->country){
//                $client->country = $request->country;
//            }
//            if($request->state){
//                $client->state = $request->state;
//            }

        }
        elseif ($request->passwords) {
//            $client->text_password = $request->password;
//            $client->password = Hash::make($request->password);
//            $client->pincode = $request->pincode;
        }
        elseif($request->private_info){
//            $client->epin = $request->epin;
//            $client->emoney = $request->emoney;
//            $client->activation_date = $request->activation_date;

            if($request->status == '1' && $client->activation == 0){
                $this->find_user_parents($client);
            }
            else if($request->status == '0' && $client->activation == 1){
                $this->down_user_parents($client);
            }

            $client->activation = $request->status;
//            $client->view = $request->view;
//            if($request->position == 0){
//                $client->pright = "1";
//            }elseif ($request->position == 1){
//                $client->pleft = '1';
//            }
//
//            $client->visanum = $request->visa_num;
//            $client->visadate = $request->visa_date;
//            $client->account_num = $request->account_num;
//
//            $client->allcom_left = $request->allocm_left;
//            $client->allcom_right = $request->allocm_right;
//            $client->exitcom_right = $request->exitcom_left;
//            $client->exitcom_left = $request->exitcom_right;

        }

        $client->save();
        session()->flash('message','Client Updated successfully');
//        session()->flash('message','Operation Failed');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        dd($id);
//        Client::destroy($id);
        session()->flash('message','Sorry Operation Failed');
        return redirect()->back();
    }

    public function get_negative(){
        $clients = Client::where('epin','<','0')->orwhere('emoney','<','0')->paginate(50);
        return view('admin.clients.negative')->with('clients',$clients);
    }


    public function filter(Request $request){
//        dd($request->all());
        $items = Client::where('id', '!=', null);

        if($request->fname !== null){
            $items->Where('fname', 'LIKE', '%' . $request->fname . '%');
        }

        if($request->sname !== null){
            $items->Where('sname', 'LIKE', '%' . $request->sname . '%');
        }

        if($request->lname !== null){
            $items->Where('lname', 'LIKE', '%' . $request->lname . '%');
        }

        if($request->username !== null){
            $items->Where('username', 'LIKE', '%' . $request->username. '%');
        }

        if($request->usercode !== null){
            $items->Where('usercode', 'LIKE', '%' . $request->usercide . '%');
        }

        if($request->nation_id !== null){
            $items->Where('Nationaid', 'LIKE', '%' . $request->nation_id . '%');
        }

        if($request->phone!== null){
            $items->Where('phone', 'LIKE', '%' . $request->phone. '%');
        }

        if($request->address !== null){
            $items->Where('address', 'LIKE', '%' . $request->address . '%');
        }

        if($request->mail !== null){
            $items->Where('mail', 'LIKE', '%' . $request->mail . '%');
        }

        if($request->activation !== null){
            $items->Where('activation','=',$request->activation);
        }

        if($request->position !== null){
            if($request->position == 1){
                $items->Where('pleft','=','1');
            }
            elseif ($request->position == 0){
                $items->Where('pright','=','1');
            }
        }

        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->bank !== null){
            if($request->bank == 1){
                $items->orderBy('emoney','DESC');
            }
            elseif($request->bank == 2){
                $items->orderBy('epin','DESC');
            }
            elseif($request->bank == 3){
                $items->orderBy('emoney','ASC');
            }
            elseif($request->bank == 4){
                $items->orderBy('epin','ASC');
            }
        }

        if($request->date !== null){
            if($request->date == 1){
                $items->orderdBY('date','DESC');
            }
            elseif($request->date == 2){
                $items->orderdBY('date','ASC');
            }
        }

        if($request->renew_date !== null){
            if($request->renew_date == 1){
                $items->orderdBY('activation_date','DESC');
            }
            elseif($request->renew_date == 2){
                $items->orderdBY('activation_date','ASC');
            }
        }

        if($request->type !== null){
            if($request->type == 0){
                $items->Where('type','=','0');
            }
            elseif($request->type == 1){
                $items->Where('type','=','1');
            }
            elseif($request->type == 2){
                $items->Where('type','=','2');
            }
            elseif($request->type == 3){
                $items->Where('type','=','3');
            }
            elseif($request->type == 4){
                $items->Where('type','=','4');
            }
        }

        if($request->parent !== null){
            if($request->parent == 0){
                $items->Where('parent_id','=','0');
            }
            elseif ($request->parent == 1){
                $items->Where('parent_id','=','0');

            }
        }

        if($request->money_from && $request->money_to){
            $items->whereBetween('emoney',[$request->money_from,$request->money_to]);
        }

        if($request->pin_from && $request->pin_to){
            $items->whereBetween('epin',[$request->pin_from,$request->pin_to]);
        }


//        dd($items->get());
        $clients = $items->paginate(100);
        return view('admin.clients.index',compact('clients'));
    }

    public function filter_negative(Request $request){
        $items = Client::where('id', '!=', null)->where('epin','<','0')->orwhere('emoney','<','0');

        if($request->fname !== null){
            $items->Where('fname', 'LIKE', '%' . $request->fname . '%');
        }

        if($request->sname !== null){
            $items->Where('sname', 'LIKE', '%' . $request->sname . '%');
        }

        if($request->lname !== null){
            $items->Where('lname', 'LIKE', '%' . $request->lname . '%');
        }

        if($request->username !== null){
            $items->Where('username', 'LIKE', '%' . $request->username. '%');
        }

        if($request->usercode !== null){
            $items->Where('usercode', 'LIKE', '%' . $request->usercide . '%');
        }

        if($request->nation_id !== null){
            $items->Where('Nationaid', 'LIKE', '%' . $request->nation_id . '%');
        }

        if($request->phone!== null){
            $items->Where('phone', 'LIKE', '%' . $request->phone. '%');
        }

        if($request->address !== null){
            $items->Where('address', 'LIKE', '%' . $request->address . '%');
        }

        if($request->mail !== null){
            $items->Where('mail', 'LIKE', '%' . $request->mail . '%');
        }

        if($request->activation !== null){
            $items->Where('activation','=',$request->activation);
        }

        if($request->position !== null){
            if($request->position == 1){
                $items->Where('pleft','=','1');
            }
            elseif ($request->position == 0){
                $items->Where('pright','=','1');
            }
        }

        if($request->view !== null){
            $items->Where('view','=',$request->view);
        }

        if($request->bank !== null){
            if($request->bank == 1){
                $items->orderBy('emoney','DESC');
            }
            elseif($request->bank == 2){
                $items->orderBy('epin','DESC');
            }
            elseif($request->bank == 3){
                $items->orderBy('emoney','ASC');
            }
            elseif($request->bank == 4){
                $items->orderBy('epin','ASC');
            }
        }

        if($request->date !== null){
            if($request->date == 1){
                $items->orderdBY('date','DESC');
            }
            elseif($request->date == 2){
                $items->orderdBY('date','ASC');
            }
        }

        if($request->renew_date !== null){
            if($request->renew_date == 1){
                $items->orderdBY('activation_date','DESC');
            }
            elseif($request->renew_date == 2){
                $items->orderdBY('activation_date','ASC');
            }
        }

        if($request->type !== null){
            if($request->type == 0){
                $items->Where('type','=','0');
            }
            elseif($request->type == 1){
                $items->Where('type','=','1');
            }
            elseif($request->type == 2){
                $items->Where('type','=','2');
            }
            elseif($request->type == 3){
                $items->Where('type','=','3');
            }
            elseif($request->type == 4){
                $items->Where('type','=','4');
            }
        }

        if($request->parent !== null){
            if($request->parent == 0){
                $items->Where('parent_id','=','0');
            }
            elseif ($request->parent == 1){
                $items->Where('parent_id','=','0');

            }
        }

        if($request->money_from && $request->money_to){
            $items->whereBetween('emoney',[$request->money_from,$request->money_to]);
        }

        if($request->pin_from && $request->pin_to){
            $items->whereBetween('epin',[$request->pin_from,$request->pin_to]);
        }


//        dd($items->get());
        $clients = $items->paginate(10);

        return view('admin.clients.negative',compact('clients'));
    }

    public function find_user_parents($user){
        $position = substr($user->code_count,strlen($user->code_count)-1,1);
        for ($i=1 ; $i<strlen($user->code_count) ; $i++){
            $client = Client::all()->where('code_count','=',substr($user->code_count,0,(strlen($user->code_count)-$i)))->first();
            if($client){
                if($position == '1'){
                    $client->exitcom_right++;
                }
                elseif ($position == '2'){
                    $client->exitcom_left++;
                }
                $client->save();
                $position = substr($client->code_count,strlen($client->code_count)-1,1);
            }
            else{
                dd('something went wrong');
            }
        }
    }

    public function down_user_parents($user){
        $position = substr($user->code_count,strlen($user->code_count)-1,1);
        for ($i=1 ; $i<strlen($user->code_count) ; $i++){
            $client = Client::all()->where('code_count','=',substr($user->code_count,0,(strlen($user->code_count)-$i)))->first();
            if($client){
                if($position == '1'){
                    $client->exitcom_right--;
                }
                elseif ($position == '2'){
                    $client->exitcom_left--;
                }
                $client->save();
                $position = substr($client->code_count,strlen($client->code_count)-1,1);
            }
            else{
                dd('something went wrong');
            }
        }
    }

}
