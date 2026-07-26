<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'icon_image',
        'account_name',
        'account_number',
        'bank_details',
        'is_active',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
        'bank_details' => 'array'
    ];

    // Relationship with donations
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // Scope for active payment methods
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order');
    }
}
