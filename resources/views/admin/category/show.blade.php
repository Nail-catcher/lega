@extends('admin.layouts_admin.main_layout_admin')

@section('content')
    <h1>Просмотр категории</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Название:</strong> {{ $category->title }}</p>
            <p><strong>ЧПУ (англ):</strong> {{ $category->slug }}</p>
            
        </div>
        <div class="col-md-6">
            
                
            
            <img src="{{ $url }}" alt="" class="img-fluid">
            
        </div>
    </div>
    
    <a href="{{ route('category.edit', ['category' => $category->id]) }}"
       class="btn btn-success">
        Редактировать категорию
    </a>
    <form method="post" class="d-inline"
          action="{{ route('category.destroy', ['category' => $category->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Удалить категорию
        </button>
    </form>
@endsection