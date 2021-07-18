<!DOCTYPE html>
<html>
<head>
    <title>Панель управления</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <script type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/db130d9367.js" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	

</head>
<body>
<ul><li><a href="{{route('admin')}}">Главная</a></li>
	<li><a href="{{route('order')}}">Заказы</a></li>
    <li><a href="{{route('news')}}">Управление акциями</a></li>
    <li><a href="{{route('category')}}">Управление категориями</a></li>
    <li><a href="{{route('undercategory')}}">Управление подкатегориями</a></li>
    <li><a href="{{route('eat')}}">Управление товарами</a></li>
    <li><a href="{{route('path_eat')}}">Управление ингридиентами</a></li></ul>

<div class="container">
@yield('content')
</div>

</body>
</html>
