@extends('admin.layouts_admin.main_layout_admin')

@section('content')
<h1>Просмотр товара</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Название:</strong> {{ $eat->title }}</p>
            <p><strong>Цена:</strong>{{ $eat->cost }} </p>
            <p><strong>Вес:</strong>{{ $eat->weight }} </p>
            <p><strong>Категория:</strong> {{ $getcat->title }}</p>
             <p><strong>Ингридиенты:</strong>        @foreach ($eat->path_eats as $path_eat) 
                {{ $path_eat->title }} /
                @endforeach</p>
        </div>
        <div class="col-md-6">
            
            
            <img src="{{ $url }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
           
            <a href="{{ route('eat.edit', ['eat' => $eat->id]) }}"
               class="btn btn-success">
                Редактировать товар
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Удалить этот товар?')"
                  action="{{ route('eat.destroy', ['eat' => $eat->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Удалить товар
                </button>
            </form>
        </div>
    </div>
@endsection