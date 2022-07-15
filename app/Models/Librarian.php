<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Librarian extends Model
{
    use HasFactory;

    protected $table = 'users';
    const ROLE = 1;
//    get all librarians === users who have role_id of Libraian::role()
    public static function all($columns = ['*']){
        # code
        return User::all()->where('role_id', Librarian::ROLE);
    }
}
