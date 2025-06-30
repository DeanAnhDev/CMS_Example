<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        $data['slug'] = Str::slug($data['name']);

        Categories::create($data);

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function show($slug)
    {
        $category = Categories::findOrFail($slug);
        return view('categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}
