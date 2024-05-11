<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
 
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    
}
