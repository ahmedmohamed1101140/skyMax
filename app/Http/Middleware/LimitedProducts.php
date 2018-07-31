<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;

class LimitedProducts
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
        $limited_products = Product::all();
        $count = array();

        foreach ($limited_products as $prodcut){
            if($prodcut->prod_limit >= $prodcut->amount){
                $count[] = $prodcut;
            }
        }
        view()->share(["limited_products"=>$count]);
        return $next($request);

    }
}
