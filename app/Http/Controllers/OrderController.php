<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Pizza;
use App\Notifications\SendOrder;
use Illuminate\Http\Request;

use Illuminate\Notifications\Notifiable;
class OrderController extends Controller
{
    use Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::orderBy('id','desc')->paginate(25);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for crordering a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly crordered resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $order=Order::where('id','=',$request->id)->first();
         //$order->notify(new SendOrder($order));
         switch ($order['status']) {
             case 3:
                 $user=User::where('id','=',$request->user_id)->first();
                 $points = $order['how_money']/10;
                 $points = number_format($points, 0, '.', ' ');
                 $user->points_pay = $user->points_pay+$points;
                 $user->save();
                 $order->status=4;
                 $order->save();

                 break;
             case 1:
                 $order->status=2;
                 $order->save();
                 break;
            case 2:
                 $order->status=3;
                 $order->save();
                 break;
             default:
                 $order->status=1;
                 $order->save();
                 break;
         }

         
         return back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

           // $getcat=Eat::where('id',$order->cat_id)->first();
       // $products = Order::findOrFail($order)->eats;
        $custompizzas =Pizza::where('basket_id','=',$order->id)->get();
        return view('admin.order.show', [
     'custompizzas'  =>    $custompizzas,
      'order'   => $order,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
       dd($request);
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
