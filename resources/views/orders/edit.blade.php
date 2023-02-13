@extends('layouts.layout')
@section('content')

    @if(Auth::user()->name === 'admin')
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Изменение товара</h1>

            {{ Form::open(['url' => route('goods.update', $good), 'method' => 'PATCH', 'class' => 'w-50']) }}
            <div class="flex flex-col">
                <div>
                    {{ Form::label('name', 'Название') }}
                </div>
                <div class="mt-2">
                    {{ Form::text('name', $good->name, ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('name') }}
                    @endif
                </div>
                <div class="mt-2">
                    {{ Form::label('cost', 'Цена') }}
                </div>
                <div class="mt-2">
                    {{ Form::text('cost', $good->cost, ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('cost') }}
                @endif
                <div class="mt-2">
                    {{ Form::submit('Обновить', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    @endif

@endsection
