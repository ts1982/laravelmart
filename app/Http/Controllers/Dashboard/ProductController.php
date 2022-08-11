<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

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
        $keyword = '';

        if ($request->sort) {
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
            $products = Product::sortable($sort_query)->paginate(10);
            $total_count = Product::count();
        }

        if ($request->keyword) {
            $keyword = trim($request->keyword);
            $total_count = Product::where('name', 'like', "%{$keyword}%")->count();
            $products = Product::where('name', 'like', "%{$keyword}%")->sortable($sort_query)->paginate(10);
        }

        if (!$request->sort && !$request->keyword) {
            $products = Product::orderBy('updated_at', 'desc')->paginate(10);
            $total_count = Product::count();
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
                'price' => 'required|numeric',
                'description' => 'required',
                'category_id' => 'numeric|min:1',
            ],
            [
                'name.required' => '商品名は必須です。',
                'price.required' => '価格は必須です。',
                'price.numeric' => '価格は数値で入力してください。',
                'description.required' => '商品説明は必須です。',
                'category_id.min' => 'カテゴリを選択してください。',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->recommend) {
            $product->recommend_flag = true;
        } else {
            $product->recommend_flag = false;
        }
        if ($request->file('image')) {
            // $image = $request->file('image')->store('public/products');
            // $product->image = basename($image);

            $path = Storage::disk('s3')->putFile('myprefix', $request->file('image'), 'public');
            $product->image = Storage::disk('s3')->url($path);
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
                'price' => 'required|numeric',
                'description' => 'required',
                'category_id' => 'numeric|min:1',
            ],
            [
                'name.required' => '商品名は必須です。',
                'price.required' => '価格は必須です。',
                'price.numeric' => '価格は数値で入力してください。',
                'description.required' => '商品説明は必須です。',
                'category_id.min' => 'カテゴリを選択してください。',
            ]
        );

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->recommend) {
            $product->recommend_flag = true;
        } else {
            $product->recommend_flag = false;
        }
        if ($request->hasFile('image')) {
            // $image = $request->file('image')->store('public/products');
            // $product->image = basename($image);

            $path = Storage::disk('s3')->putFile('myprefix', $request->file('image'), 'public');
            $product->image = Storage::disk('s3')->url($path);
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
