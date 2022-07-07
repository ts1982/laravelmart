<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

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
            $keyword = '';
            $total_count = Product::count();
            $products = Product::sortable($sort_query)->paginate(10);
            $sorted = $request->sort . ' ' . $request->direction;
        } else {
            if ($request->sort) {
                $slices = explode(' ', $request->sort);
                $sort_query[$slices[0]] = $slices[1];
                $sorted = $request->sort;
            }

            if ($request->keyword) {
                $keyword = trim($request->keyword);
                $total_count = Product::where('name', 'like', "%{$keyword}%")->orWhere('id', "{$keyword}")->count();
                $products = Product::where('name', 'like', "%{$keyword}%")->orWhere('id', "{$keyword}")->sortable($sort_query)->paginate(10);
            } else {
                $keyword = '';
                $total_count = Product::count();
                $products = Product::sortable($sort_query)->paginate(10);
            }
        }

        $sort = [
            '価格の安い順' => 'price asc',
            '価格の高い順' => 'price desc',
            '出品の古い順' => 'updated_at asc',
            '出品の新しい順' => 'updated_at desc',
        ];

        return view('dashboard/products/index', compact('products', 'sort', 'sorted', 'total_count', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => '商品名は必須です。',
                'price.required' => '価格は必須です。',
                'description.required' => '商品説明は必須です。',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->file('image')) {
            $image = $request->file('image')->store('public/products');
            $product->image = basename($image);
        }
        $product->save();

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => '商品名は必須です。',
                'price.required' => '価格は必須です。',
                'description.required' => '商品説明は必須です。',
            ]
        );

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/products');
            $product->image = basename($image);
        }
        $product->update();

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index');
    }
}
