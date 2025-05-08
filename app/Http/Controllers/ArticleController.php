<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\NodeVisitor\CommentAnnotatingVisitor;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'asc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required | string | max:255',
            'content' => 'required ',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|image| max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', ['article' => $article]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', ['article' => $article]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, )
    {
        $validated = $request->validate([
            'title' => 'required | string | max:255',
            'content' => 'required ',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|image| max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $validated['user_id'] = Auth::id();

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, )
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'berhasil');
    }
}
