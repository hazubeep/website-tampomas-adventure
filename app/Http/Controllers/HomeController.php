<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $galleries = Post::orderBy('id', 'asc')->get();
        $articles = Article::orderBy('id', 'asc')->get();

        return view('welcome', ['galleries' => $galleries, 'articles' => $articles]);
    }

    public function showArticle()
    {

    }
}
