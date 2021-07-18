@extends('admin.layouts_admin.main_layout_admin')

@section('content')
<h1>Просмотр товара</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Название:</strong> {{ $news->title }}</p>
            <p><strong>Мини описание:</strong>{{ $news->minidescription }} </p>
            <p><strong>Описание:</strong>{{ $news->description }} </p>
           
            
        </div>
        <div class="col-md-6">
            
            
            <img src="{{ $url }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
           
            <a href="{{ route('news.edit', ['news' => $news->id]) }}"
               class="btn btn-success">
                Редактировать товар
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Удалить этот товар?')"
                  action="{{ route('news.destroy', ['news' => $news->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Удалить товар
                </button>
            </form>
        </div>
    </div>
@endsection