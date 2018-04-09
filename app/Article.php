<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const TYPE_FIRESAFETY = 'brandveiligheid';
    const TYPE_NEWS = 'nieuws';
    
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'introduction',
        'description',
        'is_visible',
        'is_frontpage',
        'type',
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
        return route('articles.show', [$this->id, $this->slug]);
    }

    /**
     * Get all of the report's files.
     */
    public function files()
    {
        return $this->morphMany('App\File', 'file');
    }
}
