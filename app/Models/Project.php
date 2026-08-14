<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }

    public function reports()
    {
        return $this->hasMany(ProjectReport::class);
    }
}
