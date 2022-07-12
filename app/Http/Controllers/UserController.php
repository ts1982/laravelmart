<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users/mypage', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->name ? $request->name : $user->name;
        $user->email = $request->email ? $request->email : $user->email;
        $user->postal = $request->postal ? $request->postal : $user->postal;
        $user->address = $request->address ? $request->address : $user->address;
        $user->tel = $request->tel ? $request->tel : $user->tel;
        $user->update();

        return  redirect()->route('mypage', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = Auth::user($user);

        $user->deleted_flag = true;
        $user->update();

        Auth::logout();

        return redirect('/');
    }

    public function edit_password()
    {
        return view('users/edit_password');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();

        if ($request->password == $request->password_confirmation) {
            $user->password = bcrypt($request->password);
            $user->update();
        } else {
            return redirect()->route('mypage.edit_password');
        }

        return redirect()->route('mypage');
    }

    public function favorite(Product $product)
    {
        $user = Auth::user();

        $favorites = $user->favorites(Product::class)->paginate(5);

        return view('users/favorite', compact('favorites'));
    }

    public function unfavorite(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->id);

        $user->unfavorite($product);

        return redirect()->route('mypage.favorite');
    }

    public function cart_history_index()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->pluck('order_id')->unique()->reverse()->toArray();
        $carts = array_filter($carts);

        $orders = [];
        foreach ($carts as $cart) {
            $total_price = 0;
            $items = Cart::where('user_id', $user->id)->where('order_id', $cart)->get();
            foreach ($items as $item) {
                $total_price += $item->quantity * $item->price;
            }
            $orders[] = [
                'order_id' => $cart,
                'updated_at' => Cart::where('user_id', $user->id)->where('order_id', $cart)->first()->updated_at,
                'total_price' => $total_price,
            ];
        }

        return view('users/orders/index', compact('orders'));
    }

    public function cart_show(Request $request)
    {
        $user = Auth::user();
        $representative = Cart::where('user_id', $user->id)->where('order_id', $request->order_id)->first();
        $order_id = $representative->order_id;
        $updated_at = $representative->updated_at;
        $carts = Cart::where('user_id', $user->id)->where('order_id', $request->order_id)->get();
        $total_price = 0;
        $count = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->quantity * $cart->price;
            $count++;
        }

        return view('users/orders/show', compact('carts', 'order_id', 'updated_at', 'total_price', 'count'));
    }
}
