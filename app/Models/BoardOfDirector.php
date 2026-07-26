<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardOfDirector extends Model
{
    protected $table = 'board_of_directors';

    protected $fillable = [
        'name',
        'designation',
        'bio',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}