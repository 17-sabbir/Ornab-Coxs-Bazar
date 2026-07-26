<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'description',
        'file_path',
        'cover_image',
        'is_active',
        'order',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}