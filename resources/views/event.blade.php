@extends('layouts.app')

@section('content')

<div class="tittle"><h1>Акции</h1></div>

<div class="case-items">
		
	@foreach($news as $new)

		<div class="card-prod">
		<img src="{{asset('storage/catalog/news/source/'.$new->image)}}">
		<div class="tittle_eat"><a href="{{ route('event.show', ['news' => $new->id]) }}">
                    {{ $new->title }}
                </a></div>
		<div class="path_eat">
			{{$new->minidescription}}
		</div>
		
	</div>
	@endforeach
	

</div>
@endsection
