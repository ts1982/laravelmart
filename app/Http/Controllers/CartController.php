<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('order_id', '')->get();

        return view('carts/index', compact('cart'));
    }

    public function store(Request $request)
    {
        $warning = '';
        if (Cart::where('order_id', '')->where('product_id', $request->product_id)->exists()) {
            $warning = 'この商品はすでにカートに入っています。';
        } else {
            $user = Auth::user();
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->qty;
            $cart->price = $request->price;
            $cart->save();
        }

        return redirect()->route('carts.index')->with(compact('warning'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('order_id', '')->where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        $cart->quantity = $request->qty;
        $cart->price = $cart->product->price;
        $cart->update();

        return redirect()->route('carts.index');
    }

    public function  destroy(Request $request)
    {
        $user = Auth::user();
        Cart::where('order_id', '')->where('user_id', $user->id)->where('product_id', $request->product_id)->delete();

        return redirect()->route('carts.index');
    }

    public function order()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('order_id', '')->get();
        $order_id = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
        foreach ($cart as $item) {
            $item->order_id = $order_id;
            $item->save();
        }

        return redirect()->route('carts.index');
    }
}
