<?php

namespace App\Http\Controllers;

use Cookie;
use App\Basket;
use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PizzaController extends Controller
{
    private $basket;

    public function __construct() {
        $this->getBasket();
    }
    
     
     public function store(Request $request)
    {
        $data = $request->path;
        $comma_separated = implode(",", $data);
        $basket_id = request()->cookie('basket_id');
        
        $pizza = Pizza::create([
        'name'=>request('name'),
        'cost'=>request('cost'),
        'path'=>$comma_separated,
        'basket_id'=>$basket_id ?? $this->basket->id
        ]);
        $pizza->save();
        
       return back();
   } 
   public function destroy(Request $request)
    {
        

        $pizza=Pizza::find($request->patient);
        
        $pizza->delete();
        return back();
    }

    private function getBasket() {
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
    }
}    
