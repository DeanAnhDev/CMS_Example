<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class ClientCategoryController extends Controller
{
    public function show($slug)
    {

        $category = Categories::where('slug', $slug)->firstOrFail();

        $articles = Articles::with(['category', 'author'])
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        return view('client.categorydetail', compact('category', 'articles'));
    }
}
