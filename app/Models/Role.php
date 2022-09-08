<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const GUEST = 3;
    const GUEST_NAME = 'Guest';
    use HasFactory;

//    get all users which have some role --- useful for creating new users through admin panel
    public function users(){
        # code
        return $this->hasMany(User::class);
    }

//    accessor for role name
    public function getNameAttribute($name){
        # code
        return ucwords($name);
    }

    const ADMIN = Admin::ROLE;
    public static function admin(){
        # code
        $role = Role::findOrNew(Role::ADMIN);
        if (!$role->id){
            $role->id = Role::ADMIN;
            $role->name = 'administrator';
            $role->save();
        }
        return $role;
    }

    const LIBRARIAN = Librarian::ROLE;
    public static function librarian(){
        # code
        $role = Role::findOrNew(Role::LIBRARIAN);
        if (!$role->id){
            $role->id = Role::LIBRARIAN;
            $role->name = 'bibliotekar';
            $role->save();
        }
        return $role;
    }

    const STUDENT = Student::ROLE;
    public static function student(){
        # code
        $role = Role::findOrNew(Role::STUDENT);
        if (!$role->id){
            $role->id = Role::STUDENT;
            $role->name = 'učenik';
            $role->save();
        }
        return $role;
    }
}
