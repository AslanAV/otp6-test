<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token"/>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script src="icon_customImage.js" type="text/javascript"></script>
    <style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
    </style>
    <title>Тестовое opt6.ru</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="container">
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="{{ route('home') }}">ТЗ</a>
                @auth()
                     I'm: <a class="navbar-brand" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                @endauth
            </div>
            @auth()
                <div>
                    <a class="navbar-brand" href="{{ route('orders.index') }}">Заказы</a>
                    <a class="navbar-brand" href="{{ route('goods.index') }}">Товары</a>
                </div>
            @endauth
            @guest()
                <div>
                    <a class="navbar-brand" href="{{ route('login') }}">Войти</a>
                    <a class="navbar-brand" href="{{ route('register') }}">Регистрация</a>
                </div>
            @endguest
            @auth()
                <div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="navbar-brand" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                </div>
            @endauth
        </div>
    </nav>
</header>
<div id="app">
    <section class="container">
            <div class="mt-4 grid col-span-full">@include('flash::message')</div>
            @yield('content')
    </section>
@extends('layouts.flash-scripts')
</body>
</html>
