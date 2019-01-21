<?php

namespace App\Http\Controllers;
use App\Article;
use App\Tag;

class WelcomeController extends Controller
{

    /**
     * Show the front page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        $tags = Tag::all();
        return view('welcome',['articles' => $articles, 'tags' => $tags]);
    }

    public function tag($id)
    {
        $articles = Article::where('tag_id', '=', $id)->get();
        $tags = Tag::all();
        return view('welcome',['articles' => $articles, 'tags' => $tags]);
    }

    public function article($id)
    {
        $article = Article::find($id);
        $tags = Tag::all();
        return view('article',['article' => $article, 'tags' => $tags]);
    }
}
