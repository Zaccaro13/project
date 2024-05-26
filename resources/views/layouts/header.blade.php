@section('header')
    <head>
        <link href="{{ asset('css\header.css') }} " rel="stylesheet" />
    </head>
    <header>
        <div class="wrap-logo">
            <a href="#logo" class="logo">Логотип сайта</a>
        </div>
        <nav>
            <a @if(Request::is('/')) class="active" @endif href="{{ route('main.index') }}">Home</a>
            <a @if(Request::is('info')) class="active" @endif href="{{ route('info.about') }}">About</a>
        </nav>
        <div class="registration-dropdown">
            <button class="dropbtn">Реєстрація</button>
            <div class="dropdown-content">
                <a href="#">Авторизація</a>
                <a href="#">Реєстрація</a>
            </div>
        </div>
    </header>
@show
