<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private $userId;
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'store', 'destroy','update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ArticleResource
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'details' => 'required',
            'user_id' => 'required',
            'tag_id' => 'required',
        ]);
        $article = Article::create([
            'user_id' => $request->user_id,
            'tag_id' => $request->tag_id,
            'title' => $request->title,
            'details' => $request->details,
        ]);

        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return ArticleResource|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'details' => 'required',
        ]);

        $article->update($request->only(['title', 'details']));

        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
