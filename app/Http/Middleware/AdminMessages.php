<?php

namespace App\Http\Middleware;

use App\Models\Friend;
use Closure;

class AdminMessages
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
        $friends = Friend::all()->where('friend_id','=','-1');
        $messages_array = [];
        foreach ($friends as $friend){
            foreach ($friend->messages as $message){
                if($message->readed == '0' && $message->msg_from != '-1'){
                    if(!array_key_exists($message->msg_from,$messages_array)){
                        array_push($messages_array,$friend);
                    }
                }
            }
        }
//        dd($messages_array[0]->client->username);
        view()->share(['new_messages'=>array_unique($messages_array)]);
        return $next($request);
    }
}
