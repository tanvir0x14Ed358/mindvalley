<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the articles for the tag.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
