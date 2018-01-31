<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Get all of the owning 'fileable' models.
     */
    public function file()
    {
        return $this->morphTo();
    }
}
