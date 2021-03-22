@extends('admin.layouts_admin.main_layout_admin')

@section('content')
	<form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
		 @csrf
		 <div class="form-group">
		<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Название категории" required></div>
<div class="form-group">
		<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Уникалное название на английском" required></div>
<div class="form-group">
            <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
        </div>
<input class="btn btn-primary" type="submit" value="Сохранить">
	</form>
@endsection
