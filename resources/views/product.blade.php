@extends('layouts.app')

@section('content')

<div class="tittle"><h1>{{$category->title}}</h1></div>
<div class="filter-line"><h1 class="huilter"><i class="fas fa-plus"></i> Фильтр</h1> <h2 class="sort">
	@if($focost=='ASC')
	<a href="{{ route('catalog.category', ['slug' => $category->slug, 'cost'=>'DESC']) }}" id="sortdesc" >По цене<i class="fa fa-sort-asc" aria-hidden="true"></i></a>
	@else
	<a href="{{ route('catalog.category', ['slug' => $category->slug, 'cost'=>'ASC']) }}" id="sortasc" >По цене<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
	@endif
	@if($foweight=='ASC')
	<a href="{{ route('catalog.category', ['slug' => $category->slug, 'weight'=>'DESC']) }}" id="sortdesc" >По весу<i class="fa fa-sort-asc" aria-hidden="true"></i></a>
	@else
	<a href="{{ route('catalog.category', ['slug' => $category->slug, 'weight'=>'ASC']) }}" id="sortasc" >По весу<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
	@endif
	</h2>
</div>
<div class="case-items">
		@if($category->slug=='pizza' )
		<h1 class="createpizza">Создать пиццу <i class="fas fa-plus"></i></h1>
		<div class="pizza-construct">
			
			
  <ul class="ks-cboxtags">
  	<form method="post" action="{{ route('pizza.create') }}" enctype="multipart/form-data">
  		@csrf
  		<input type="hidden" class="form-control" name="name" placeholder="Наименование"
           required value="Уникальная пицца">
           <input type="hidden" class="pizzacostinput" name="cost" 
           required value="">
  	@foreach ($category->path_eats as $path_eat) 
    <li><input type="checkbox" class="hehe" data-id="{{$path_eat->id}}" data-name="{{$path_eat->title}}" data-cost="{{$path_eat->cost}}" id="{{ $path_eat->id }}" name="path[]" value="{{ $path_eat->title }}"><label for="{{ $path_eat->id }}" >{{ $path_eat->title }} {{$path_eat->cost}} Р</label></li>
    @endforeach
</ul>
    
		<div class="cost-howmany">
        <p class="pizzacost" data-offpay="0">0 Р</p><button type="submit" class="btn btn-danger" id="pushpizza">Сохранить</button></form>
    <!--     <div class="howmany"><i class="far fa-minus-square" name="custom-pizza" data-id="custom-pizza" data-name="Уникальная пицца" data-cost="0" id="minus"></i><p id="custom-pizza">0</p>
			

		<i class="far fa-plus-square" name="custom-pizza" data-id="custom-pizza" data-name="Уникальная пицца" data-cost="0" id="plus"></i></div> -->
			</div>
		</div>
		
	
	@endif
	@foreach($eats as $eat)

		<div class="card-prod">
		<img src="{{asset('storage/catalog/eat/source/'.$eat->image)}}">
		<div class="tittle_eat">{{$eat->title}}

        </div>
			{{--@if($category->slug=='pizza' )--}}
				{{--<div>--}}

					{{--<input type="radio" name="{{$eat->id}}" id="{{$eat->title}}" value="0" checked>--}}
					{{--<label for="{{$eat->title}}" style="color:white">20 см</label>--}}

					{{--<input type="radio" name="{{$eat->id}}" id="{{$eat->title}}" value="1" >--}}
					{{--<label for="{{$eat->title}}"  style="color:white">30 см</label>--}}

						{{--</div>--}}
			{{--<script>--}}
				{{--$('#{{$eat->title}}').click(function(){--}}
				{{--var value = $('#{{$eat->title}}:checked').val();--}}
				{{--var plus = document.getElementById('plus');--}}
				{{--var minus = document.getElementById('minus');--}}
					{{--minus.dataset.mod = value;--}}
					{{--plus.dataset.mod = value;--}}

				{{--});--}}
				{{--</script>--}}
			{{--@endif--}}
		<div class="path_eat">
			@foreach ($eat->path_eats as $path_eat) 
                {{ $path_eat->title }},
                @endforeach
		</div>
		<div class="cost-howmany">
		<div class="cost">{{ $eat->cost }} Р</div>
		<div class="weight">{{ $eat->weight }} Гр</div>
		<div class="howmany"><i class="far fa-minus-square" data-id="{{$eat->id}}" data-name="{{$eat->title}}" data-cost="{{$eat->cost}}"  data-mod="0" id="minus"></i><p id="{{$eat->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$eat->id}}" data-name="{{$eat->title}}" data-cost="{{$eat->cost}}"  data-mod="0" id="plus"></i></div>
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

<script type="text/javascript">	
$('.createpizza').click(function() {
 	$('.pizza-construct').slideToggle(300, function(){
			if ($(this).is(':hidden')) {
				$('.createpizza').html('Создать пиццу <i class="fas fa-plus"></i>');
			} else {
				$('.createpizza').html('Создать пиццу <i class="fas fa-minus"></i>');
			}							
		});      
		return false;
	});
$('.huilter').click(function() {
 	$('.sort').slideToggle(300, function(){
			if ($(this).is(':hidden')) {
				$('.huilter').html('<i class="fas fa-plus"></i> Фильтр');
			} else {
				$('.huilter').html('<i class="fas fa-minus"></i> Фильтр');
			}							
		});      
 });

</script>

<style>

</style>
@endsection
