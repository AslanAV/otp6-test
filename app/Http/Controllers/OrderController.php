<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Good;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Auth::guest(),403);

        $goods = Good::pluck('name', 'id');

        return view('orders.create', compact('goods'));
    }

    public function store(StoreOrderRequest $request)
    {
        if (Auth::guest()) {
            return redirect()->route('orders.index');
        }

        $validated = $request->validated();
        $order = new Order();
        $order->fill($validated);
//        $order->save();

        if (array_key_exists('goods', $validated)) {
//            $order->goods()->attach($validated['goods']);
        }

        dd($order->goods()->sum());

        flash("Заказ успешно добавлен")->success();
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
