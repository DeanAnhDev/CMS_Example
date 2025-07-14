<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ClientArticleController extends Controller
{
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

}
