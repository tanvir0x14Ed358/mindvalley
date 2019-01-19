<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Photo;
use App\Http\Resources\PhotoResource;

class PhotoController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $photo = Photo::firstOrCreate(
            [
                'article_id' => $article->id,
            ],
            ['photo' => $request->photo]
        );

        return new PhotoResource($photo);
    }
}
