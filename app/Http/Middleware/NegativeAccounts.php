<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;

class NegativeAccounts
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
        $clients = Client::where('epin','<','0')->orwhere('emoney','<','0')->select('id');
        view()->share(["negative_accounts"=>$clients->count()]);
        return $next($request);
    }
}
