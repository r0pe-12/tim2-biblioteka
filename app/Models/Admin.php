<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $table = 'users';
    const ROLE = 3;

    public static function all($columns = ['*']){
        # code
        return User::all()->where('role_id', Admin::ROLE);
    }
}
