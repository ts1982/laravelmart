<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\MajorCategory;
use App\Product;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_categories = MajorCategory::all();
        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();
        $id = $recommend_products->pluck('id');
        $latest_products = Product::whereNotIn('id', $id)->orderBy('created_at', 'desc')->take(4)->get();

        return view('web/index', compact('categories', 'major_categories', 'recommend_products', 'latest_products'));
    }
}
