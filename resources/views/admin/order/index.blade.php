@extends('admin.layouts_admin.main_layout_admin')

@section('content')
	<h1>Заказы</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Доставка\Оплата</th>
            <th width="30%">Наименование</th>
            
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($orders as $order)
        @if($order->status!=null)
        <tr>
            <td>{{ $order->id }}</td>
            <td>
@switch($order->shipping)
    @case(0)
        <span> Самовывоз, оплата картой при получении</span>
        @break

    @case(1)
        <span>Самовывоз,оплачено через сайт</span>
        @break
    @case(2)
        <span> Самовывоз, за наличность (Сдача с {{$order->cashback ?? ' '}}</span>
        @break

    @case(3)
        <span>Доставка, оплата картой при получении</span>
        @break
    @case(4)
        <span> Доставка, оплачено через сайт</span>
        @break

    

    @default
        <span>Доставка, за наличность (Сдача с {{$order->cashback ?? ' '}})</span>
@endswitch</td>
            <td>
                <a href="{{ route('order.show', ['order' => $order->id]) }}">
                    {{ $order->name }}
                </a>
            </td>

    
</td>

            <td>
                @if($order->status==1)
                <p>В обработке</p>
                    <form action="{{ route('order.store') }}"
          method="post" class="d-inline" id="{{$order->id}}">
        @csrf
        <input type="hidden" name="id" value="{{$order->id}}">
        <input type="hidden" name="user_id" value="{{$order->user_id}}">
        <input type="hidden" name="status" value="{{$order->status}}">
                <button type="submit" form="{{$order->id}}">
                    Следующий этап
                </button>
            </form>
                @elseif($order->status==2)
                <p>Готовится</p>
                    <form action="{{ route('order.store') }}"
          method="post" class="d-inline" id="{{$order->id}}">
        @csrf
        <input type="hidden" name="id" value="{{$order->id}}">
        <input type="hidden" name="user_id" value="{{$order->user_id}}">
        <input type="hidden" name="status" value="{{$order->status}}">
                <button type="submit" form="{{$order->id}}">
                    Следующий этап
                </button>
            </form>
                @elseif($order->status==3)
                <p>Доставка</p>
                    <form action="{{ route('order.store') }}"
          method="post" class="d-inline" id="{{$order->id}}">
        @csrf
        <input type="hidden" name="id" value="{{$order->id}}">
        <input type="hidden" name="user_id" value="{{$order->user_id}}">
        <input type="hidden" name="status" value="{{$order->status}}">
                <button type="submit" form="{{$order->id}}">
                    Следующий этап
                </button>
            </form>
                @else($order->status==4)
                <p>Закрыт</p>
                @endif
             
         
            </td>
            <td>
                {{$order->order_time ?? 'На ближайшее'}}
            </td>
        </tr>
        @endif
        @endforeach
    </table>

    {{ $orders->links() }} 
@endsection
