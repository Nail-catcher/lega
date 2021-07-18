<?php

namespace App\Http\Controllers;
use Cookie;
use App\Basket;
use App\Pizza;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BasketController extends Controller
{

	private $basket;

    public function __construct() {
        $this->getBasket();
    }

        public function index(Request $request) {
          $hui =   strtotime("now"); //H:i:s
          $dateH = date("H", $hui)+5;
          
          $date2 = date("Y-m-d", $hui);
          
        $basket_id = $request->cookie('basket_id');

        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->eats;
            $custompizzas =Pizza::where('basket_id','=',$basket_id)->get();
           
            return view('basket.index', compact('products','basket_id','custompizzas','date2','dateH'));
        } else {
            abort(404);
        }
    }

    /**
     * Форма оформления заказа
     */
    public function checkout() {
        return view('basket.checkout');
    }

    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request, $id) {
        $quantity = $request->input('how_many') ?? 1;
        $this->basket->increase($id, $quantity);
        // выполняем редирект обратно на ту страницу,
        // где была нажата кнопка «В корзину»
        //return back();
    }

    /**
     * Увеличивает кол-во товара $id в корзине на единицу
     */
    public function plus($id) {

        $this->basket->increase($id);
        // выполняем редирект обратно на страницу корзины
        return back();
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus($id) {
        
        $this->basket->decrease($id);
        // выполняем редирект обратно на страницу корзины
        return back();
    }
  
    /**
     * Возвращает объект корзины; если не найден — создает новый
     */
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
    public function ordercreate(Request $request)
    {
        $id = request('order_id');
        $date = $request->date. ' ' . $request->hours .':' .$request->minutes .':00';

        $ts   = strtotime($date);
        if ($ts){
        $date2 = date("Y-m-d H:i:s", $ts);
        } else {
            $date2=null;
        }


        //dd(gettype($date2));
        if($request->shipping==1){
            switch ($request->money) {
                case "cash":
                    $shipping=2;
                    break;
                case "equaring":
                    $shipping=1;
                    break;               
                default:
                    $shipping=0;
                    break;
            }
        } else {
             switch ($request->money) {
                case "cash":
                    $shipping=5;
                    break;
                case "equaring":
                    $shipping=4;
                    break;               
                default:
                    $shipping=3;
                    break;
            }
        }
        $cashback=(int)request('cashback');
        
        Basket::find($id)->update([

            
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('e-mail'),
            'street' => request('street'),
            'home'=> request('homes'),
            'apartment' => request('apartment'),
            'entrance' => request('entrance'),
            'floor' => request('floor'),
            'order_time' => $date2,
            'cashback' => $cashback,
            'person' => request('person'),
            'how_money' => request('how_money'),
            'points_pay' => request('points_pay'),
            'user_id' => request('user_id'),
            'status' => 1,
            'shipping' => $shipping,
        ]);
        $user=User::where('id','=',$request->user_id)->first();
        $points = $request->points_pay;
        $user->points_pay = $user->points_pay-number_format($points, 0, '', '');
        $user->save();
        foreach($_COOKIE as  $item => $item_count){
           
            if (is_int($item) or $item == "basket_id") {
                Cookie::queue(
    Cookie::forget($item)
);
            }

        
        }
        return redirect()->route('welcome');

    }
}