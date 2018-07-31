<?php

namespace App\Http\Controllers\Arabic;

use App\Models\ChatMessages;
use App\Models\Client;
use App\Models\ClientMessage;
use App\Models\Country;
use App\Models\Friend;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index(){
        $countries = Country::all();
        $states    = State::all();

        $user = auth()->user();
        foreach ($user->friends as $friend){
            if($friend->friend_id == -1){
                return view('site_ar.friends', compact('countries','states'));
            }
        }

        $conv_id = Carbon::now()->timestamp;
        $friend = new Friend();
        $friend->user_id = auth()->user()->id;
        $friend->friend_id = -1;
        $friend->conv_id = $conv_id;
        $friend->save();

        return view('site_ar.friends', compact('countries','states'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_friend(Request $request){
        if($request->user() == auth()->user()->usercode){
            session()->flash('error',"خطأ فى الكود الخاص بالمستخدم حاول مره اخرى");
            return redirect()->back();
        }
        $user = Client::all()->where('usercode','=',$request->usercode)->first();
        if($user == null){
            session()->flash('error','عفوا لا يوجد مستخدم بهذا الكود حاول مره اخرى بكود اخر');
            return redirect()->back();
        }
        foreach (auth()->user()->friends as $friend){
            if($friend->friend_id == $user->id){
                session()->flash('error','لديك بالفعل هذا الصديق في قائمة الأصدقاء الخاصة بك');
                return redirect()->back();
            }
        }
        $conv_id = Carbon::now()->timestamp;
        $friend = new Friend();
        $friend->user_id = auth()->user()->id;
        $friend->friend_id = $user->id;
        $friend->conv_id = $conv_id;
        $friend->save();

        $friend = new Friend();
        $friend->user_id = $user->id;
        $friend->friend_id = auth()->user()->id;
        $friend->conv_id = $conv_id;
        $friend->save();

        session()->flash('message','تم إضافه صديقك يمكنك مراسلته الان');
        return redirect()->back();

    }

    public function show_message($id){
        $countries = Country::all();
        $states    = State::all();
        $messages = Friend::all()->where('conv_id','=',$id)->first();
        foreach ($messages->messages as $message){
            if($message->msg_from != auth()->user()->id){
                $message->readed = 1;
                $message->save();
            }
        }
        return view('site_ar.chat',compact('messages','countries','states'));
    }

    public function send_message(Request $request){

        $message = new ChatMessages();
        $message->message = $request->message;
        $message->conv_id = $request->conv_id;
        $message->msg_from = auth()->user()->id;
        $message->readed = 0;
        dd($message);
        $message->save();

        return redirect()->back();
    }

    public function send(Request $request){
        $message = new ClientMessage();
        $message->subject = $request->subject;
        $message->message = $request->msg;
        $message->date = Carbon::now();
        $message->read_admin = '0';
        $message->read_client = '0';
        $message->client_sender_id = auth()->user()->id;

        if($request->username){
            $user = Client::all()->where('username','=',$request->username)->first();
            if($user && $user->id !== auth()->user()->id){
                $message->client_recevier_id = $user->id;
            }
            else{
                dd('Wrong User Name');
            }
        }
        else if($request->admin == null){
            $message->client_recevier_id = 1;
            dd('admin');
        }
        $message->save();
        return redirect()->back();
    }

    public function sent(Request $request){
        $countries = Country::all();
        $states    = State::all();
        $sent_messages = ClientMessage::all()->where('client_sender_id' ,'=',auth()->user()->id);
        $recevied_messages = ClientMessage::all()->where('client_recevier_id','=',000);

        return view('site.chat', compact('countries','states','recevied_messages','sent_messages'));

    }

    public function received(Request $request){

        $countries = Country::all();
        $states    = State::all();
        $sent_messages = ClientMessage::all()->where('client_sender_id' ,'=',000);
        $recevied_messages = ClientMessage::all()->where('client_recevier_id','=',auth()->user()->id);

        return view('site.chat', compact('countries','states','recevied_messages','sent_messages'));
    }

    public function filter(Request $request){
        $countries = Country::all();
        $states    = State::all();

        if($request->username){
            $user = Client::all()->where('username' ,'=',$request->username)->first();

            $query = ClientMessage::query();
            $columns = [
                'client_sender_id',
                'client_recevier_id',
            ];

            foreach ($columns as $column) {
                $query->orWhere($column, '=',  auth()->user()->id );
            }


            $messages = $query->get();

            dd($messages);

        }



        $sent_messages = ClientMessage::all()->where('client_sender_id' ,'=',auth()->user()->id);
        $recevied_messages = ClientMessage::all()->where('client_recevier_id','=',000);

        return view('site.chat', compact('countries','states','recevied_messages','sent_messages'));


    }
}
