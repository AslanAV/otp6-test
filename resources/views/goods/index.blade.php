@extends('layouts.layout')
@section('content')
        <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
            Товары  </h1>
        @if(Auth::user()->name === 'admin')
            <div>
                @csrf
                <a href="{{ route('goods.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Создать товар </a>
            </div>
        @endif
        <div class="row">
        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                @if(Auth::user()->name === 'admin')
                    <th>Действия</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($goods as $good)
                <tr class="border-b border-dashed text-left">
                    <td>{{ $good->id }}</td>
                    <td><a href="{{ route('goods.show', $good) }}">{{ $good->name }}</a></td>
                    <td>{{ $good->cost }}</td>
                    @if(Auth::user()->name === 'admin')
                        <td>
                            <a
                                class="text-red-600 hover:text-red-900"
                                rel="nofollow"
                                data-method="delete"
                                data-confirm="Вы действительно хотите удалить товар!"
                                href="{{ route('goods.destroy', $good) }}"
                            >
                                удалить
                            </a>
                            <a class="text-blue-600 hover:text-blue-900"
                               href="{{ route("goods.edit", $good) }}"
                            >
                                изменить
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    @auth()
        <div class="mt-4 grid col-span-full">{{ $goods->links() }}</div>
    @endauth
@endsection
