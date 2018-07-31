<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRenewDate
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
        if(Auth::user())    {
            $current_date = Carbon::now();
            $next_month = Carbon::now()->addMonth();
            $next_day = Carbon::now()->addDays(15);
            $message="";
            if($current_date >= Auth::user()->renew_date){
                $message = "sorry we Block You renew your Account";
                view()->share(["renew_warning"=>$message]);
                Auth::logout();
                return redirect("/");
            }
            else if($next_day >= Auth::user()->renew_date){
                $message = "second Warning you have 15 Day to renew your account";
                $message = "15 Day to renew";
            }
            else if($next_month >= Auth::user()->renew_date){
                $message = "first Warning you have 1 month to renew your account";
                $message = "1 month to renew ";

            }
            view()->share(["renew_warning"=>$message]);
            return $next($request);
        }
        else{
            return $next($request);
        }



    }
}
