<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table='experiences';
    protected $fillable=[
        'designation',
        'address',
        'company',
        'start_date',
        'end_date',
        'status',
        'descriptions',
    ];
}
