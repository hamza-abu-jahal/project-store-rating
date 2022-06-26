<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return response()->view('dashboard.store-categories.index', ['categories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.store-categories.create');
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
                'name-category' => 'required|min:3|max:50'
            ],
            [
                'name-category.required' => 'Enter Name Category Please ... !'
            ]
        );

        $category = new Category();
        $category->name = $request->input('name-category');
        $isSaved = $category->save();
        return redirect()->route('categories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        //  return view('dashboard.store.create')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->view('dashboard.store-categories.edit', ['categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate(
            [
                'name-category' => 'required|min:3|max:50'
            ]
        );
        $category->name = $request->input('name-category');
        $isSaved = $category->save();
        session()->flash('message', $isSaved ? 'Category Updated' : 'Category Ubdate Failed');
        session()->flash('status', $isSaved);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Store::where('store_category_id', $category->id)->delete();
        // $isDeleted = $category->delete();
        // return redirect()->back();


        if (in_array($category->id, Store::select('store_category_id')->pluck('store_category_id')->toArray())) {
            session()->flash('undelete');
            return redirect()->back();
        } else {
            if (Category::findOrFail($category->id)->delete()) {
                return redirect()->back();
            }
        }
    }
}
