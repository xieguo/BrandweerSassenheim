<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'introduction',
        'description',
        'is_visible',
    ];

    /**
     * Returns the title as a slug
     *
     * @return string
     */
    public function getSlugAttribute()
    {
        return str_slug($this->title);
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return route('article.show', [$this->id, $this->slug]);
    }
}
