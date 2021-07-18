@extends('layouts.app')
@push('huityles')
    <link href="{{ asset('css/hiddenmenu.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="lk_cart">
	<h1>Личный <br>Кабинет</h1>
	<form action="{{route('lk.store')}}"  method="post" class="d-inline">
	<div class="personal">
		<h2>Данные</h2>
		
			{{ csrf_field() }}
			<label>Имя</label><br>
			<input type="text" name="name" value="{{Auth::user()->name}}"><br>
			<label>Телефон</label><br>
			<input type="phone" name="phone" value="{{Auth::user()->phone}}"><br>
			<label>Е-mail</label><br>
			<input type="text" name="e-mail" value="{{Auth::user()->email}}"><br><br>
		<h3>Дата рождения: {{date('j. m. Y', strtotime(Auth::user()->bday))}} <br>в этот день вы получите скидку 30%!</h3><br>
		<h2>У вас {{Auth::user()->points_pay}} баллов</h2>
	</div>		
	<div class="adress">
		<h2>Адрес</h2>
			<label>Улица</label><br>
			<input type="text" name="street" value="{{Auth::user()->street}}"><br>
			<label>Дом</label><br>
			<input type="text" name="home" value="{{Auth::user()->home}}"><br>
			<label>Квартира</label><br>
			<input type="text" name="apartment" value="{{Auth::user()->apartment}}"><br>
			<label>Подъезд</label><br>
			<input type="text" name="entrance" value="{{Auth::user()->entrance}}"><br>
			<label>Этаж</label><br>
			<input type="text" name="floor" value="{{Auth::user()->floor}}"><br>
			<button type="submit" class="btn btn-danger">Сохранить</button>
				
	</div>
	</form>	
</div>
@endsection