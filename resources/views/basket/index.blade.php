@extends('layouts.app')
@push('huityles')
    <link href="{{ asset('css/hiddenmenu.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="lk_cart">
    
        
    <h1>Ваша корзина</h1>
    <div class="personal" style="margin-left: -10%;">
    @if (count($products) or $custompizzas)
        @php
            $basketCost = 0;
        @endphp
        <table class="ordertable" >
           
            <tr >
               
                <th><h3>Мой заказ </h3><p class="mobile_atten">Рекомендуется горизонтальное положение устройства</p></th>
                
                <th></th>
                <th></th>
            </tr>
            @if($custompizzas)
            @foreach($custompizzas as $custompizza)
            <tr >
               
               @php
                    $itemPrice = $custompizza->cost;
                    
                    $basketCost = $basketCost + $itemPrice;
                @endphp
                <td>{{$custompizza->name}}</td>
                
                <td> <a href="{{ route('pizza.destroy', ['patient' =>$custompizza->id]) }}"><i class="fas fa-trash-alt" style="color:red"></i></a></td>
                <td>{{$custompizza->cost}}</td>
                
            </tr>
            @endforeach
            @endif
            @if($products)
             @foreach($products as $product)
                @php
                    $itemPrice = $product->cost;
                    $itemQuantity =  $product->pivot->how_many;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr >
                    <td >
                        {{ $product->title }} 
                    </td>
                    
                    <td>
    <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
          method="post" class="d-inline" id="form.{{$product->id}}">
        @csrf
        <button type="submit" class="m-0 p-0 border-0 bg-transparent" form="form.{{$product->id}}">
            <i class="far fa-minus-square" style="color:white" data-id="{{$product->id}}" data-name="{{$product->title}}" data-cost="{{$product->cost}}"></i>
        </button>
    </form>
    <span class="mx-1">{{ $itemQuantity }}</span>
    <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
          method="post" class="d-inline" id="form_plus.{{$product->id}}">
        @csrf
        <button type="submit" class="m-0 p-0 border-0 bg-transparent" form="form_plus.{{$product->id}}">
            <i class="far fa-plus-square" style="color:white" data-id="{{$product->id}}" data-name="{{$product->title}}" data-cost="{{$product->cost}}" id="minus"></i>
        </button>
    </form>
</td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                </tr>
            @endforeach
            @endif
            <form action="{{route('basket.ordercreate')}}" method="post" class="d-inline" id="form_main">
            <tr >
                <th colspan="1" class="text-left"><h3>Итого</h3></th>
                <th colspan="1"> </th>
                <th><h3>{{ number_format($basketCost, 2, '.', '') }}</h3></th>
            </tr>
             <tr>
                <th colspan="1" class="text-left">Для оплаты доступно</th>
                <th colspan="1"> </th>
                <th>{{Auth::user()->points_pay}} Баллов (1 балл = 1 рубль)</th>
            </tr>
             <tr>
                <th colspan="1" class="text-left">Потратить</th>
                <th colspan="1"> </th>

                <th><input type="number" max="{{Auth::user()->points_pay}}" min="0" id='points_pay' name="points_pay" style="height: 25px; width: 70px;"></th>
            </tr>
            <tr>
                <th colspan="1" class="text-left">Сумма к оплате:</th>
                <th colspan="1"> </th>
                <th id="visiblevalue">{{ number_format($basketCost, 0,'','') }} P</th>
            </tr>
        </table>

        <div id="freedosttext" >
            <p style="color: red">Бесплатная доставка начинается с <i id ="cost">500</i> рублей</p>

        </div>
    </div>
        <div class="adress order">
        <div class="choiseoffer"><a href="#" id="dost" style="color:#ED2828">Доставка</a><a href="#" id="notdost">Самовывоз</a></div>
        
        
            @csrf
            <input type="hidden" name="order_id" value="{{$basket_id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="how_money" id="how_money" value="{{$basketCost}}">            
            <input type="hidden" name="shipping" id="shipping" value="0">
            <table class="" style="color:white; ">
            <tr ><td colspan="4"><label>Имя*</label><br>
            <input type="text" name="name" value="{{Auth::user()->name}}" style="width: 600px;" required></td></tr>
            <tr ><td colspan="2"><label>Телефон*</label><br>
            <input type="phone" name="phone" style="width: 300px;" value="{{Auth::user()->phone}}" required></td>
             <td  colspan="2"><label>Е-mail</label><br>
            <input type="text" name="e-mail" value="{{Auth::user()->email}}" style="width: 300px;"></td></tr>
            </table>
            <table class="adresstable" style="color:white; ">
            <tr><td colspan="2">
                    <label>Район*</label><br>
                    <select name="freedost" id="freedost" style="width: 300px;">
                        <option value="0"> </option>
                        <option value="700">Заозёрный</option>
                        <option value="700">Рябково</option>

                            <option value="700">Энергетики</option>

                                <option value="1200">Вороновка</option>
                                    <option value="700">Бульвар Солнечный</option>
                                    <option value="700">Восточный</option>

                                        <option value="500">Центральный</option>

                                            <option value="500">Западный</option>

                                                <option value="700">Северный</option>

                                                    <option value="1200">Малое Чаусово
                        </option>
                        <option value="1200">Кетово
                        </option>
                        <option value="1200">Увал
                        </option>
                        <option value="1200">Сиреневый
                        </option>
                    </select>
                    <options>

                    </options></td>
                <td colspan="2"><label>Улица*</label><br>
            <input type="text" name="street" style="width: 300px;" value="{{Auth::user()->street}}" required></td></tr>
             <tr >
            <td colspan="1"><label>Дом*</label><br>
            <input type="text" name="homes" style="width: 121px;" value="{{Auth::user()->home}}" required></td>
            <td colspan="1"><label>Квартира*</label><br>
            <input type="text" name="apartment" style="width: 121px;" value="{{Auth::user()->apartment}}" required></td>
            <td colspan="1"><label>Подъезд</label><br>
            <input type="text" name="entrance" style="width: 121px;" value="{{Auth::user()->entrance}}"></td>
            <td colspan="1"><label>Этаж</label><br>
            <input type="text" name="floor" style="width: 121px;" value="{{Auth::user()->floor}}"></td></tr>
            
            </table>
            <table class="" style="color:white; "><tr > <td colspan="2"><p><input class="radiotime" name="far" type="radio" id="notfar" value="notfar" checked="checked" style="margin-right: 10px;">На ближайшее</p></td>
             <td colspan="2"><p><input class="radiotime" name="far" type="radio" id="far" value="far" style="margin-right: 10px;">К определенному времени</p></td> <td colspan="2" ><p><input  name="person" type="number" min="1" style="height: 25px; width: 70px; text-align: center; margin-right: 10px;">Количество персон</p></td> </tr>
             </table>
            <table class="ontime" style="color:white;display: none; ">
            <div class="ontime" style="display: none;">
            <td colspan="2"><label>Дата</label><br>
            <input type="date" name="date" min="{{$date2}}" style="width: 232px;"></td>
            <td colspan="1"><label>Часы</label><br>
            <input type="number" min="{{$dateH}}" max="21" name="hours" style="width: 121px;"></td>
            <td colspan="1"><label>Минуты</label><br>
            <input type="number" name="minutes" step="15" max="45" min="0" style="width: 121px;"></td></div>
            
             <tr >
            </table>
            <table class="nonefar" style="color:red;display: none; ">
                <div class="nonefar" style="display: none;">
                    <td colspan="6"><label>Ресторан уже не работает (часы приема заказов: 10.00-22.00), приходите завтра</label><br>

                    </div>

                <tr >
            </table>
            <table class="buttons" style="color:white;">
                <tr ><td colspan="4"><label>Комментарий</label><br>
            <input type="textarea" name="comment" style="width: 600px; margin-bottom: 12px;"><td></tr>
                <tr >
            <td colspan="2"><p><input class="radiomoney" name="money" id="cash" type="radio" value="cash" >Наличными </p><div class="cashback" id="cashback" style="display: none"><p>Нужна сдача с  </p> <p><input type="number" name="cashback" min="1000" step="1000" max="5000" style="height: 25px; width: 70px; text-align: center;">  Р
            </p></div></td>
             <td colspan="2"><p><input name="choise1" type="checkbox" required>С условиями доставки согласен*</p></td></tr>
             <tr >
            {{--<td colspan="2"><p><input class="radiomoney" name="money" type="radio" value="equaring">Банковской картой на сайте</p></td>--}}
            <td colspan="2"><p><input name="choise1" type="checkbox" required>Я согласен с условиями <br>использования персональных данных*</p></td></tr>
            <tr >
            <td colspan="2"><p><input class="radiomoney" name="money" type="radio" value="card" checked="checked">Банковской картой при получении</p></td>
           
            
            <td colspan="2"><button type="submit" class="btn btn-danger" id="setvaluebutton" form="form_main">Сохранить</button></td>
        </tr>
            </table>
        
    </div>
    </form>
</div>
  
    @else
        <p>Ваша корзина пуста</p>
    @endif

    <script type="text/javascript">
$("#points_pay").bind("change paste keyup", function() {
    var nowvalue = $("#how_money").val()-$(this).val();

    if (nowvalue>0){
    $('#visiblevalue').html(nowvalue + ' P');
    } else {
        $('#visiblevalue').html('Бесплатно');
    }


    $("#setvaluebutton").click(function() {
        if (nowvalue>0){
        $("#how_money").val(nowvalue);
        } else {

        $("#how_money").val(0);
        }
    });
});
        points_pay

if (500>={{$basketCost}}){
    $('#freedosttext').css('display', 'block');

} else {
    $('#freedosttext').css('display', 'none');
}

$('#freedost').on('change',function(){
    $('#cost').html($("#freedost option:selected").val());
    if($("#freedost option:selected").val()>={{$basketCost}}){
        $('#freedosttext').css('display', 'block');

    } else {
        $('#freedosttext').css('display', 'none');
    }
});
        console.log( {{$basketCost}});
    </script>
@endsection