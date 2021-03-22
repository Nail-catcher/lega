@extends('layouts.app')

@section('content')
<h1>Просмотр товара</h1>
    <div class="row">
        <div class="col-md-4" id="textevent">
            <p><strong>{{ $news->title }} </strong> </p><br>
            <p>{{ $news->description }} </p>
           
            
        </div>
        <div class="col-md-6" id="imgevent">
            
            
            <img src="{{ $url }}" alt="" class="img-fluid" >
        </div>
    </div>
    
@endsection