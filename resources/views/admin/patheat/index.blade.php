@extends('admin.layouts_admin.main_layout_admin')

@section('content')


<h1>Все ингридиенты</h1>
    <a href="{{route('path_eat.build')}}" class="btn btn-success mb-4">
        Создать товар
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
       
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($path_eats as $path_eat)
        <tr>
            <td>
                <a href="{{ route('path_eat.show', ['path_eat' => $path_eat->id]) }}">
                    {{ $path_eat->title }}
                </a>
            </td>
            <td>
                <a href="{{ route('path_eat.edit', ['path_eat' => $path_eat->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('path_eat.destroy', ['path_eat' => $path_eat->id]) }}"
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
    {{ $path_eats->links() }}
@endsection
