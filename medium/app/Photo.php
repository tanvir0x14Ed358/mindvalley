<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id', 'name',
    ];

    /**
     * Get the article that owns the photo.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
