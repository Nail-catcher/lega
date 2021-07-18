@extends('admin.layouts_admin.main_layout_admin')

@section('content')
<h1>Все категории</h1>
    <a href="{{ route('category.build') }}" class="btn btn-success mb-4">
        Создать категорию
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>
                <a href="{{ route('category.show', ['category' => $category->id]) }}">
                    {{ $category->title }}
                </a>
            </td>

    
</td>

            <td>
                <a href="{{ route('category.edit', ['category' => $category->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('category.destroy', ['category' => $category->id]) }}"
                      method="post" onsubmit="return confirm('Удалить эту категорию?')">
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
    {{ $categories->links() }} 
@endsection
