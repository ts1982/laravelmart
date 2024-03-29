<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\MajorCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_query = [];
        $sorted = '';

        if ($request->direction) {
            $sort_query = [$request->sort => $request->direction];
            $products = Product::where('category_id', $request->category)->sortable($sort_query)->paginate(6);
            $total_count = Product::where('category_id', $request->category)->count();
            $sorted = $request->sort . ' ' . $request->direction;
            $category = Category::find($request->category);
        } else {
            if ($request->sort) {
                $slices = explode(' ', $request->sort);
                $sort_query[$slices[0]] = $slices[1];
                $sorted = $request->sort;
            }

            if ($request->category) {
                $products = Product::where('category_id', $request->category)->sortable($sort_query)->paginate(6);
                $total_count = Product::where('category_id', $request->category)->count();
                $category = Category::find($request->category);
            } else {
                $products = Product::sortable($sort_query)->paginate(6);
                $total_count = '';
                $category = null;
            }
        }

        $sort = [
            '並び替え' => '',
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'updated_at asc',
            '出品の新しい順' => 'updated_at desc',
        ];

        $categories = Category::all();
        $major_categories = MajorCategory::all();

        return view('products/index', compact('products', 'category', 'categories', 'major_categories', 'total_count', 'sort', 'sorted'));
    }

    public function favorite(Product $product)
    {
        $user = Auth::user();

        if ($user->hasFavorited($product)) {
            $user->unfavorite($product);
        } else {
            $user->favorite($product);
        }

        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();

        return view('products/show', compact('product', 'reviews'));
    }
}
