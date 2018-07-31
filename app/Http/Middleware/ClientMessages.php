<?php

namespace App\Http\Middleware;

use App\Models\Friend;
use Closure;
use Illuminate\Support\Facades\Auth;

class ClientMessages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            $friends = Friend::all()->where('user_id','=',Auth::user()->id);
            $messages_array = array();
            foreach ($friends as $friend){
                foreach ($friend->messages as $message){
                    if($message->readed == '0' && $message->msg_from != Auth::user()->id){
                        array_push($messages_array,$message->msg_from);
                    }
                }
            }
            view()->share(['new_messages'=>array_unique($messages_array)]);
            return $next($request);
        }
        return $next($request);
    }
}
