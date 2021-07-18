@extends('admin.layouts_admin.main_layout_admin')

@section('content')
	<h1>Создание нового товара</h1>
    <form method="post" action="{{ route('eat.store') }}" enctype="multipart/form-data">
    	@csrf
<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Наименование"
           required maxlength="100" value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
           required maxlength="100" value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="cost" placeholder="Цена"
           required maxlength="100" value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="weight" placeholder="Вес"
           required maxlength="100" value="">
</div>
<div class="form-group">
    <h2>Добавить на главную</h2>
    <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="1">Да
           <input type="radio" class="" name="carousel" placeholder="Добавить на главную"
           value="0" checked="checked">Нет
</div>
<div class="form-group">
   
    <select name="cat_id" class="form-control" title="Категория">
        <option value="0">Выберите категорию</option>
        @foreach($items as $item)
        <option value="{{ $item->id }}">
        {{ $item->title ?? ''}}
    </option>
    @endforeach
    </select>
</div>
<div class="form-group" style="float: left; border-right: 1px solid black;">
    <label>Ингридиенты</label>
    
        @foreach($path_eats as $path_eat)
<label style="display:block" class="custom-control custom-checkbox">
<input type="checkbox"  name="path_eats[]" value="{{ $path_eat->id }}"><span class="custom-control-description">{{ $path_eat->title }}</span>
</label>
@endforeach
</div>
<div class="form-group" style="float: left; ">
    <label>В меню ингридиентов</label>
    
        @foreach($underitems as $underitem)
<label style="display:block" class="custom-control custom-checkbox">
<input type="checkbox"  name="underitems[]" value="{{ $underitem->id }}"><span class="custom-control-description">{{ $underitem->title }}</span>
</label>
@endforeach
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($eat->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
    	</form>
@endsection
