<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * Get the article that owns the photo.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
