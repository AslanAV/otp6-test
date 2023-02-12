<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Models\Good;
use Illuminate\Support\Facades\Auth;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::paginate(15);
        return view('goods.index', compact('goods'));
    }

    public function create()
    {
        abort_if(Auth::guest(),403);

        return view('goods.create');
    }

    public function store(StoreGoodRequest $request)
    {
        if (Auth::guest()) {
            return redirect()->route('goods.index');
        }

        $validated = $request->validated();

        $good = new Good();

        $good->fill($validated);
        $good->save();

        flash("Товар успешно добавлен.")->success();
        return redirect()->route('goods.index');
    }

    public function show(Good $good)
    {
        return view('goods.show', compact('good'));
    }

    public function edit(Good $good)
    {
        return view('goods.edit', compact('good'));
    }

    public function update(UpdateGoodRequest $request, Good $good)
    {
        if (Auth::guest()) {
            return redirect()->route('goods.index');
        }

        $validated = $request->validated();

        $good->fill($validated);
        $good->save();

        flash("Товар успешно изменен")->success();
        return redirect()->route('goods.index');
    }

    public function destroy(Good $good)
    {
//        if ($good->orders()->exists()) {
//            flash(__('Невозможно удалить товар так как он используется в заказах.'))->error();
//            return back();
//        }
        $good->delete();

        flash(__('Товар успешно удален.'))->success();
        return redirect()->route('goods.index');
    }
}
