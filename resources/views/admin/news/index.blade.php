@extends('admin.layouts_admin.main_layout_admin')

@section('content')
 <h1>Все акции</h1>
    <a href="{{ route('news.build') }}" class="btn btn-success mb-4">
        Создать акции
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            <th width="30%">Мини описание</th>
                  
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($news as $new)
        <tr>
            <td>
                <a href="{{ route('news.show', ['news' => $new->id]) }}">
                    {{ $new->title }}
                </a>
            </td>
            <td>{{ $new->minidescription }}</td>
            
          

            <td>
                <a href="{{ route('news.edit', ['news' => $new->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('news.destroy', ['news' => $new->id]) }}"
                      method="post" onsubmit="return confirm('Удалить этот товар?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $news->links() }}
@endsection
