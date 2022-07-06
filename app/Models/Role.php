<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

//    get all users which have some role --- useful for creating new users through admin panel
    public function users(){
        # code
        return $this->hasMany(User::class);
    }
}
