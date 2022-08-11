<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\MajorCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);
        $major_categories = MajorCategory::all();

        return view('dashboard/categories/index', compact('categories', 'major_categories'));
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
        $request->validate(
            [
                'name' => 'required | unique:categories',
                'description' => 'required',
                'major_category_id' => 'required',
            ],
            [
                'name.required' => 'カテゴリ名を入力してください。',
                'name.unique' => 'カテゴリ名『' . $request->name . '』はすでに登録されています。',
                'description.required' => 'カテゴリの説明を入力してください。',
                'major_category_id.required' => '親カテゴリを選択してください。',
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->major_category_name = MajorCategory::find($request->major_category_id)->name;
        $category->major_category_id = $request->major_category_id;
        $category->save();

        return redirect('/dashboard/categories');
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
    public function edit(Category $category)
    {
        $major_categories = MajorCategory::all();

        return view('dashboard/categories/edit', compact('category', 'major_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name' => ['required', Rule::unique('categories')->ignore($category->id),],
                'description' => 'required',
            ],
            [
                'name.required' => 'カテゴリ名を入力してください。',
                'name.unique' => 'カテゴリ名『' . $request->name . '』はすでに登録されています。',
                'description.required' => 'カテゴリの説明を入力してください。',
            ]
        );

        $category->name = $request->name;
        $category->description = $request->description;
        $category->major_category_name = MajorCategory::find($request->major_category_id)->name;
        $category->major_category_id = $request->major_category_id;
        $category->update();

        return redirect('/dashboard/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/dashboard/categories');
    }
}
