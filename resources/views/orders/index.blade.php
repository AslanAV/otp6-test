@php
    use App\Helpers\GeoLocateHelper;
@endphp
@extends('layouts.layout')
@section('content')
    <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
        Товары </h1>
    @if(Auth::user()->name === 'admin')
        <div>
            @csrf
            <a href="{{ route('orders.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Создать Заказ </a>
        </div>
    @endif
    <div class="row">
        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
            <tr>
                <th>ID</th>
                <th>Сумма</th>
                <th>Номер Телефона</th>
                <th>Email</th>
                <th>Адрес</th>
                @if(Auth::user()->name === 'admin')
                    <th>Действия</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                @php($geo = json_decode($order->address, true))
                <tr class="border-b border-dashed text-left">
                    <td><a href="{{ route('orders.show', $order) }}">{{ $order->id }}</a></td>
                    <td>{{ $order->sum_of_order }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->email }}</td>
                    <td>Широта: {{ $geo['geo_lat'] }}, Долгота: {{ $geo['geo_lon'] }}</td>
{{--                    <td>{{GeoLocateHelper::getAdressFromGeo($geo)}}</td>--}}
                    @if(Auth::user()->name === 'admin')
                        <td>
                            <a
                                class="text-red-600 hover:text-red-900"
                                rel="nofollow"
                                data-method="delete"
                                data-confirm="Вы действительно хотите удалить товар!"
                                href="{{ route('orders.destroy', $order) }}"
                            >
                                удалить
                            </a>
                            <a class="text-blue-600 hover:text-blue-900"
                               href="{{ route("orders.edit", $order) }}"
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
        <div class="mt-4 grid col-span-full">{{ $orders->links() }}</div>
    @endauth
@endsection
