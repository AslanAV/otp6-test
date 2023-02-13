@extends('layouts.layout')
@section('content')

    @if(Auth::user()->name === 'admin')
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Создание заказа</h1>

            {{ Form::open(['url' => route('orders.store'), 'method' => 'POST', 'class' => 'w-50']) }}
            <div class="flex flex-col">
                <div>
                    {{ Form::label('sum', 'Сумма') }}
                </div>
                <div class="mt-2">
                    {{ Form::text('sum', '', ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('sum') }}
                    @endif
                </div>
                <div class="mt-2">
                    {{ Form::label('phone_number', 'Номер телефона') }}
                </div>
                <div class="mt-2">
                    {{ Form::text('phone_number', '', ['class' => 'form-control rounded border-gray-300 w-1/3', 'id' => 'phone_number']) }}
                    @extends('layouts.mask')
                </div>
                @if ($errors->any())
                    {{ $errors->first('phone_number') }}
                @endif
                <div class="mt-2">
                    {{ Form::label('email', 'Email') }}
                </div>
                <div class="mt-2">
                    {{ Form::text('email', '', ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('email') }}
                @endif
                <div class="mt-2">
                    {{ Form::label('address', 'Адрес') }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('address') }}
                @endif

                <div class="mt-2">
                    {{ Form::text('address', '', ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                    <div id="map" style="width: 600px; height: 400px"></div>
                    @extends('layouts.yamap')
                </div>


                <div class="mt-4">
                    {{ Form::label('goods', 'Товары') }}
                </div>
                <div class="mt-2">
                    {{ Form::select('goods[]', $goods, null, ['class' => 'form-control rounded border-gray-300 w-1/3 h-75 d-inline-block', 'multiple' => 'multiple']) }}
                </div>
                <div class="mt-2">
                    {{ Form::submit('Создать', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>


            </div>
            {{ Form::close() }}
        </div>
    @endif

@endsection
