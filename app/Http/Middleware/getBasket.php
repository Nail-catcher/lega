<?php

namespace App\Http\Middleware;

use Closure;
use App\Basket;
use Cookie;
class getBasket
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
     $basket_id = request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $this->basket = Basket::findOrFail($basket_id);
                
            } catch (ModelNotFoundException $e) {
                $this->basket = Basket::create();
              
            }
        } else {
            $this->basket = Basket::create();
           
        }
        Cookie::queue('basket_id', $this->basket->id, 525600);
        return $next;
    }
}
