<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $articles = Articles::latest()->paginate(10);
        $news  = Articles::latest()->take(3)->get();
        return view('client.home', compact('categories', 'articles', 'news'));
    }
}
