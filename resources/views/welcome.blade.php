
@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/mainmediahueta.css') }}" rel="stylesheet">
@endpush
<div class="carousel">
	

	<div class="item 0" id="item0" name="nonhidden"><div class="front"><h1>{{$carousel[0]->title}}</h1>
		@if($carousel[0]->cost)


		<div class="howmanyevent">
			<h2>{{$carousel[0]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[0]->id}}" data-name="{{$carousel[0]->title}}" data-cost="{{$carousel[0]->cost}}" id="minus"></i><p id="{{$carousel[0]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[0]->id}}" data-name="{{$carousel[0]->title}}" data-cost="{{$carousel[0]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[0]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[0]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[0]->image}}">
		@endif
		</div></div>
	<div class="item 1" id="item1"><div class="front"><h1>{{$carousel[1]->title}}</h1>
		@if($carousel[1]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[1]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[1]->id}}" data-name="{{$carousel[1]->title}}" data-cost="{{$carousel[1]->cost}}" id="minus"></i><p id="{{$carousel[1]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[1]->id}}" data-name="{{$carousel[1]->title}}" data-cost="{{$carousel[1]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[1]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[1]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[1]->image}}">
		@endif</div></div>
	<div class="item 2" id="item2"><div class="front"><h1>{{$carousel[2]->title}}</h1>
		@if($carousel[2]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[2]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[2]->id}}" data-name="{{$carousel[2]->title}}" data-cost="{{$carousel[2]->cost}}" id="minus"></i><p id="{{$carousel[2]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[2]->id}}" data-name="{{$carousel[2]->title}}" data-cost="{{$carousel[2]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[2]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[2]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[2]->image}}">
		@endif</div></div>
	<div class="item 3" id="item3"><div class="front"><h1>{{$carousel[3]->title}}</h1>
		@if($carousel[3]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[3]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[3]->id}}" data-name="{{$carousel[3]->title}}" data-cost="{{$carousel[3]->cost}}" id="minus"></i><p id="{{$carousel[3]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[3]->id}}" data-name="{{$carousel[3]->title}}" data-cost="{{$carousel[3]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[3]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[3]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[3]->image}}">
		@endif</div></div>
	<div class="item 4" id="item4"><div class="front"><h1>{{$carousel[4]->title}}</h1>
		@if($carousel[4]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[4]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[4]->id}}" data-name="{{$carousel[4]->title}}" data-cost="{{$carousel[4]->cost}}" id="minus"></i><p id="{{$carousel[4]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[4]->id}}" data-name="{{$carousel[4]->title}}" data-cost="{{$carousel[4]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[4]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[4]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[4]->image}}">
		@endif</div></div>
	<div class="item 5" id="item5"><div class="front"><h1>{{$carousel[5]->title}}</h1>
		@if($carousel[5]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[5]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[5]->id}}" data-name="{{$carousel[5]->title}}" data-cost="{{$carousel[5]->cost}}" id="minus"></i><p id="{{$carousel[5]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[5]->id}}" data-name="{{$carousel[5]->title}}" data-cost="{{$carousel[5]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[5]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[5]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[5]->image}}">
		@endif</div></div>
	<div class="item 6" id="item6"><div class="front"><h1>{{$carousel[6]->title}}</h1>
		@if($carousel[6]->cost)

		<div class="howmanyevent">
			<h2>{{$carousel[6]->cost}} Р</h2>

			<i class="far fa-minus-square" data-id="{{$carousel[6]->id}}" data-name="{{$carousel[6]->title}}" data-cost="{{$carousel[6]->cost}}" id="minus"></i><p id="{{$carousel[6]->id}}">0</p>
			

		<i class="far fa-plus-square" data-id="{{$carousel[6]->id}}" data-name="{{$carousel[6]->title}}" data-cost="{{$carousel[6]->cost}}" id="plus"></i></div>
		<img src="{{'storage/catalog/eat/image/'.$carousel[6]->image}}">
		@else
		<div class="howmanyevent">
			<p>{{$carousel[6]->minidescription}}</p></div><img src="{{'storage/catalog/news/image/'.$carousel[6]->image}}">
		@endif</div></div>

	<div class="circles">
	<div class="circle 0" id="circle0" name="checked"></div>
	<div class="circle 1" id="circle1"></div>
	<div class="circle 2" id="circle2"></div>
	<div class="circle 3" id="circle3"></div>
	<div class="circle 4" id="circle4"></div>
	<div class="circle 5" id="circle5"></div>
	<div class="circle 6" id="circle6"></div>
	</div>

</div>
@endsection
