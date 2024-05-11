<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'email',
        'password',

    ];
    
}
