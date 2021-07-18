@extends('admin.layouts_admin.main_layout_admin')

@section('content')
	<form action="{{route('path_eat.store')}}" method="post">
		 {{ csrf_field() }}
		<label>Наименование</label><br>
		<input type="text" name="title">
		<div  id="hide" style="display:none;">
		<label>Цена</label><br>
		<input type="number" name="cost" >
		</div>
		<div class="form-group">
    
    
        @foreach($categories as $category)
		<label style="display:block" class="custom-control custom-checkbox">
		<input type="checkbox"  name="categories[]" id="{{ $category->slug }}" value="{{ $category->id }}"><span class="custom-control-description">{{ $category->title }}</span>
		</label>
@endforeach
</div>
		
		
<input class="btn btn-primary" type="submit" value="Сохранить">
	</form>

	<script type="text/javascript">

function toggle() {
  var div = document.getElementById('hide');
  if(this.checked)
    div.style.display = 'block';
  else
    div.style.display = 'none'
    }
document.getElementById('pizza').onchange = toggle;
	</script>
@endsection
