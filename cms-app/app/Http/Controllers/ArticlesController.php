<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $articles = Articles::with('category', 'author')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required',
            'thumbnail' => 'required|image',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Articles::create($data);

        return redirect()->route('articles.index')->with('success', 'Tạo bài viết thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $article = Articles::where('slug', $slug)->with(['category', 'author'])->firstOrFail();
        $relatedArticles = Articles::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest()
            ->take(2)
            ->get();

        $trendingArticles = Articles::where('id', '!=', $article->id)
            ->where('status', 'published')
            ->orderBy('views', 'desc')
            ->take(2)
            ->get();

        return view('client.detail', compact('article', 'relatedArticles', 'trendingArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $article) {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('articles.edit', compact('article', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articles $article) {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required',
            'thumbnail' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $article) {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Xóa bài viết thành công!');
    }
}
