@extends('admin.layouts_admin.main_layout_admin')

@section('content')
    <h1>Заказ номер {{ $order->id }}</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Заказ создан:</strong> {{ $order->created_at }}</p>
            <p><strong>Имя:</strong> {{ $order->name }}</p>
            <p><strong>Телефон:</strong> {{ $order->phone }}</p>
            <p><strong>Приготовить к:</strong> {{ $order->order_time ?? 'На ближайшее'}}</p>
            <p><strong>Количество персон:</strong> {{ $order->person }}</p>
            <p>
                @if($order->shipping==3 or $order->shipping==4 or $order->shipping==5)

                <strong>Адрес:</strong>ул.{{ $order->street }} д.{{ $order->home }} кв.{{ $order->apartment }} п.{{ $order->entrance }} э.{{ $order->floor }}</p>
                @else
                  <strong>Самовывоз</strong>
                @endif
            <p><strong>Состав заказа:</strong> 
             @foreach ($order->eats as $eat) 
                {{ $eat->title }} ({{ $eat->pivot->how_many }} шт)/
                @endforeach
                 </p>
                @if($custompizzas)

                     @foreach($custompizzas as $custompizza)
           <p><strong>Уникальная пицца номер {{$custompizza->id}}:</strong> 
                {{$custompizza->path}}
                </p>
                
            
            @endforeach
                @endif
                </p>
                 
                 <p><strong>Стоимость:</strong> {{ $order->how_money }} р</p>

        </div>
        
    </div>
    
@endsection