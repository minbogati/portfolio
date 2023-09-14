<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profiles';
    protected $guarded=[
        'name',
        'email',
        'address',
        'mobile',
        'alternative_mobile',
        'designation',
        'image',
        'facebook',
        'linkedin',
        'instagram',
        'short_description',
        'description',
        
    ];
}
