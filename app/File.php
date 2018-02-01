<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * @var array
     */
    protected $attributes = [
        'type' => 'photo',
    ];

    public function getPathAttribute()
    {
        if (starts_with($this->file, 'brandweer-sassenheim/'))
        {
            return url_cdn($this->file);
        }

        return 'http://cdn.brandweersassenheim.nl/large/' . $this->file;
    }

    /**
     * Get all of the owning 'fileable' models.
     */
    public function file()
    {
        return $this->morphTo();
    }
}
