<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerInfo extends Model
{
    protected $table = 'volunteer_info';

    protected $fillable = [
        'what_you_can_do',
        'eligibility',
        'benefits',
    ];
}
