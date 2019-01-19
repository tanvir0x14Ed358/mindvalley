<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details',
    ];

    /**
     * Get the photos for the article post.
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    /**
     * Get the tag that owns the article.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
