<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'users';
    const ROLE = 2;
    public static function all($columns = ['*'])
    {
        return User::all()->where('role_id', Student::ROLE);
    }
}
