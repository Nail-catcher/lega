@extends('layouts.app')

@section('content')

<div class="tittle"><h1>{{$undercategory->title}}</h1></div>
<div class="filter-line"></div>
<div class="case-items">
		@if($undercategory->slug=='pizza')
		<div class="pizza-construct">
			<h1>Создать пиццу </h1>
			
  <ul class="ks-cboxtags">
  	@foreach ($undercategory->path_eats as $path_eat) 
    <li><input type="checkbox" id="{{ $path_eat->title }}" name="path_eats[]" value="{{ $path_eat->id }}"><label for="{{ $path_eat->title }}">{{ $path_eat->title }}</label></li>
    @endforeach
</ul>
    
		<div class="cost-howmany">
        <p>0 Р</p><button type="submit" class="btn btn-danger">Сохранить</button>
			</div>
		</div>
		
	
	@endif
	@foreach($undercategory->eats as $eat)

		<div class="card-prod">
		<img src="{{asset('storage/catalog/eat/source/'.$eat->image)}}">
		<div class="tittle_eat">{{$eat->title}}</div>
		<div class="path_eat">
			@foreach ($eat->path_eats as $path_eat) 
                {{ $path_eat->title }},
                @endforeach
		</div>
		<div class="cost-howmany">
		<div class="cost">{{ $eat->cost }} Р</div>
		<div class="weight">{{ $eat->weight }} Гр</div>
		<div class="howmany"><i class="far fa-minus-square" data-id="{{$eat->id}}" data-name="{{$eat->title}}" data-cost="{{$eat->cost}}" id="minus"></i><p id="{{$eat->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$eat->id}}" data-name="{{$eat->title}}" data-cost="{{$eat->cost}}" id="plus"></i></div>
		<!-- <form action="{{ route('basket.add', ['id' => $eat->id]) }}"
          method="post" class="form-inline">
        @csrf
        <label for="input-quantity">Количество</label>
        <input type="text" name="quantity" id="input-quantity" value="1"
               class="form-control mx-2 w-25">
        <button type="submit" class="btn btn-success">Добавить в корзину</button>
    </form> -->

		</div>
	</div>
	@endforeach
	

</div>
@endsection
