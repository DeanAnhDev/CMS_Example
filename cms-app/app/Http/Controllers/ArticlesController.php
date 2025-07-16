<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\CategoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::with('categoryDetail', 'author')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categoryDetails = CategoryDetail::with('category')->get();
        return view('articles.create', compact('categoryDetails'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required',
            'thumbnail' => 'required|image',
            'category_detail_id' => 'required|exists:category_detail,id',
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

    public function show($slug)
    {
        $article = Articles::where('slug', $slug)
            ->with(['categoryDetail', 'author'])
            ->firstOrFail();

        $relatedArticles = Articles::where('category_detail_id', $article->category_detail_id)

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

    public function edit(Articles $article)
    {
        $categoryDetails = CategoryDetail::with('category')->get();
        return view('articles.edit', compact('article', 'categoryDetails'));
    }

    public function update(Request $request, Articles $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required',
            'thumbnail' => 'nullable|image',
            'category_detail_id' => 'required|exists:category_detail,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy(Articles $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Xóa bài viết thành công!');
    }

    public function showDetail(Articles $article)
    {
        return view('articles.show', compact('article'));
    }

    public function home()
    {
        $categories = Categories::all();
        $articles = Articles::with('categoryDetail')
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        $news = Articles::with('categoryDetail')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
        return view('client.home', compact('categories', 'articles', 'news'));
    }

}
