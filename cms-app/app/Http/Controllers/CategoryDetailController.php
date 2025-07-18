<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\CategoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryDetails = CategoryDetail::with('category')->paginate(10);
        return view('category_detail.index', compact('categoryDetails'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('category_detail.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        CategoryDetail::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('category_detail.index')->with('success', 'Created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $categoryDetail = CategoryDetail::findOrFail($id);
        $categories = Categories::all();
        return view('category_detail.edit', compact('categoryDetail', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $categoryDetail = CategoryDetail::findOrFail($id);
        $categoryDetail->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('category_detail.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $categoryDetail = CategoryDetail::findOrFail($id);
        $categoryDetail->delete();

        return redirect()->route('category_detail.index')->with('success', 'Deleted successfully!');
    }

    public function showCategoryDetailArticles($categorySlug ,$slug)
    {
        // Tìm CategoryDetail theo slug
        $categoryDetail = CategoryDetail::where('slug', $slug)->firstOrFail();

        // Lấy danh sách bài viết thuộc category_detail_id và status là published
        $articles = Articles::with('author')
            ->where('category_detail_id', $categoryDetail->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        return view('client.category_detail_articles', compact('categoryDetail', 'articles'));
    }
}
