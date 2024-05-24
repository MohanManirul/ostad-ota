<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'start_date',
        'end_date',
    ];

}

