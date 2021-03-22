@extends('admin.layouts_admin.main_layout_admin')

@section('content')
<h1>Редактирование товара</h1>
    <form method="post" action="{{ route('eat.update',['eat'=>$eat->id]) }}" enctype="multipart/form-data">
    	@method('PUT')
    	@csrf

<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Наименование"
           required maxlength="100" value="{{ $eat->title }}">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="cost" placeholder="Цена"
           required maxlength="100" value="{{ $eat->cost }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="weight" placeholder="Вес"
           required maxlength="100" value="{{ $eat->weight }}">
</div>
@if($eat->carousel)
<div class="form-group">
    <h2>На главной</h2>

    <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="1" checked="checked">Да
           <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="0" >Нет
</div>
@else
<div class="form-group">
    <h2>Добавить на главную</h2>

    <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="1">Да
           <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="0" checked="checked">Нет
</div>
@endif
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
    	</form>
@endsection
