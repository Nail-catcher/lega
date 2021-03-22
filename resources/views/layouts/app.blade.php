
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/db130d9367.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediahueta.css') }}" rel="stylesheet">
</head>
<body>
    <img class="logo" src="{{asset('img/logo.png')}}">
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm" id="navbarSupportedContent">
            <div class="container" id="navbarSupportedContent">
               
                <button id="navbarSupportedContent" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" id="navbarSupportedContent3"></span>
                </button>

                <div class="collapse navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item-item" >
                                <a href="#">62-09-09</a>
                            </li>
                        <li class="nav-item-item" >
                                <a href="{{ route('event') }}">АКЦИИ</a>
                            </li>
                            <li class="nav-item-item" >
                                <a href="{{ route('login') }}">О ДОСТАВКЕ</a>
                            </li>
                        <!-- Authentication Links -->
                        
                        @guest
                            <li class="nav-item" id="rightpoint">
                                <a href="{{ route('login') }}"><img id="navbarSupportedContentimg" src="{{asset('img/userLOCK.png')}}"></a>
                            </li>
                         
                        @else
                            <li class="nav-item dropdown" id="rightpointdd">
                                <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img id="navbarSupportedContentimg" id="dropdownimg" style="margin-top: -9px;" src="{{asset('img/user.png')}}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="navbarSupportedContent">
                                    <a class="dropdown-item" href="{{ route('lk') }}">
                                        Личный Кабинет
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        
                        </div>
                    </ul>

                    <ul id="casecase">
                        <li  id="foocase" >
                                <a href="#"><img id="caseimg" src="{{asset('img/order.png')}}">ПУСТАЯ КОРЗИНА</a>
                            </li>
                        <li id="fullcase" >
                                <a href="{{ route('basket.index') }}"><img id="caseimg" src="{{asset('img/shopping-bag.png')}}"><span  id="fullcasea">0 / 0 P</span></a>
                                

                            </li>
                    </ul>
                    <div class="minibasket"><H1>Мой заказ</H1><h2>0</h2>

                        <div class="eatbasket" id="eatbasket"><h2></h2></div>
                               <!-- <form action=""
          method="post" class="form-inline">
        @csrf
        <label for="input-name">Название</label>
        <input type="text" name="name" id="input-name" value="1"
               class="form-control mx-2 w-25">
        <label for="input-quantity">Количество</label>
        <input type="text" name="quantity" id="input-quantity" value="1"
               class="form-control mx-2 w-25">
        <button type="submit" class="btn btn-success">Добавить в корзину</button>
    </form> -->
    <a href="{{route('basket.index')}}">Оформить заказ</a>
                                </div>
                </div>
            </div>
        </nav>
        <div class="close-menu-left"><img id="first" src="{{asset('img/Arrow.png')}}"><h2>МЕНЮ</h2><img id="second" src="{{asset('img/Arrow.png')}}"></div>
        <div class="custom-menu-left" >
            <div class="top-menu" ><h1>МЕНЮ</h1><div class="butclose"><img src="{{asset('img/close.png')}}" ></div><br>
                <div class="top-menu-choise"><div class="cat"><a id="cat" href="#">Категории</a></div><div class="eatpathmenu"><a id="eatpathmenu" href="#">Ингридиенты</a></div></div>
            </div>
            <div class="categorymenu">
                  <li id="mobileevents" ><img src="{{asset('img/events.png')}}"><a class="nav-link" href="{{ route('event') }}">Акции</a></li>
            <ul >
                
            <!-- <li><img src="{{asset('img/juse.png')}}"><a class="nav-link" href="{{ route('register') }}">Пицца</a></li> -->
          
             
            @foreach($items as $item)
            <li><img src="{{asset('storage/catalog/category/source/'.$item->image)}}"><a class="nav-link" href="{{ route('catalog.category', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
@endforeach 
            

        </ul></div><div class="patheatmenuitems">
        <ul>
            @foreach($underitems as $underitem)
            <li><img src="{{asset('storage/catalog/undercategory/source/'.$underitem->image)}}"><a class="nav-link" href="{{ route('catalog.undercategory', ['slug' => $underitem->slug]) }}">{{ $underitem->title }}</a></li>
@endforeach 

        </ul></div>
    </div>
        <main class="py-4" >
            @yield('content')
        </main>

@include('layouts.footer');
    </div>




    <script src="{{ asset('js/menu.js') }}" defer></script>
    <script src="{{ asset('js/basket.js') }}" defer></script>
    <script src="{{ asset('js/pizzaconstruct.js') }}" defer></script>
    <script src="{{ asset('js/carousel.js') }}" defer></script>

    @stack('styles')
    @stack('huityles')

</body>
</html>
