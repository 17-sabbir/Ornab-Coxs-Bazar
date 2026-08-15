<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'notice_no',
        'description',
        'attachment',
        'image',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];
}
