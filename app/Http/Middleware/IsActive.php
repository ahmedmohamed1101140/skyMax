<?php

namespace App\Http\Middleware;

use App\Models\Visiting;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsActive
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
            $visitor = Visiting::all()->where('user_id','=',Auth::user()->id)->first();
            if($visitor){
                if($visitor->ip == $request->ip()){
                    return $next($request);
                }
                else{
                    session()->flash('error','This Account Is Currently Logged in from another device');
                    return redirect()->back();
                }
            }
            else{
                return $next($request);
            }
        }
        return $next($request);
    }
}
