<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return route('article.show', $this->id);
    }
}
