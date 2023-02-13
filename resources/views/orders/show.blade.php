@extends('layouts.layout')
@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-6 text-4xl">
            Просмотр Товара:
        </h1>
        <h2 class=" mb-4 text-4xl">
            {{ $good->name }} /
            <a href="{{ route('goods.edit', $good) }}">Изменить</a>
        </h2>
        <p><span class="font-black">Имя: </span> {{ $good->name }}</p>
        <p><span class="font-black">Цена:</span> {{ $good->cost }}</p>
        <p><span class="font-black">Создан: </span>{{ $good->created_at }}</p>
    </div>
@endsection
