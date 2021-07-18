@extends('admin.layouts_admin.main_layout_admin')

@section('content')
	<h1>Создание нового товара</h1>
    <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
    	@csrf
<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Наименование"
           required maxlength="100" value="">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="minidescription" placeholder="Мини Описание"
           required value="">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="Описание"
           required value="">
</div>
<div class="form-group">
    <h2>Добавить на главную</h2>
    <input type="checkbox" class="form-control" name="carousel" placeholder="Добавить на главную"
           value="1">
</div>

<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($news->image)
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
