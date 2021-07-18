@extends('admin.layouts_admin.main_layout_admin')

@section('content')
 <h1>Все товары</h1>
    <a href="{{ route('eat.build') }}" class="btn btn-success mb-4">
        Создать товар
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            <th width="10%">Цена</th>
            <th width="10%">Вес</th>            
            <th width="50%">Ингридиенты</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($eats as $eat)
        <tr>
            <td>
                <a href="{{ route('eat.show', ['eat' => $eat->id]) }}">
                    {{ $eat->title }}
                </a>
            </td>
            <td>{{ $eat->cost }}</td>
            <td>{{ $eat->weight }}</td>
            <td>@foreach ($eat->path_eats as $path_eat) 
                {{ $path_eat->title }} /
                @endforeach
    
</td>

            <td>
                <a href="{{ route('eat.edit', ['eat' => $eat->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('eat.destroy', ['eat' => $eat->id]) }}"
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
    {{ $eats->links() }}
@endsection
