<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'username',
        'jmbg',
        'photoPath',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    mutator for password
    public function setPasswordAttribute($password){
        # code
        $this->attributes['password'] = Hash::make($password);
    }

//    accessor for image
    public function getPhotoPathAttribute($path){
        # code
        if (strpos($path, 'http://') !== FALSE || strpos($path, 'https://') !== FALSE){
            return $path;
        }
        if ($path){
            return '/storage/images/users/' . $path;
        }
//        return 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO';
        return asset('img/profile.jpg');
    }

//    get all logins of an user
    public function logins(){
        # code
        return $this->hasMany(Logins::class, 'user_id');
    }

//    get last login of user
    public function lastLogin(){
        # code
        if (!count($this->logins)){
            return 'Nije se nikad ulogovao/la';
        }
        return str_replace(['pre'], ['prije'], Carbon::parse($this->logins()->latest()->first()->created_at)->diffForHumans());
    }

//    get role of an user
    public function role(){
        # code
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(): bool
    {
        # code
        return $this->role == Role::admin();
    }

    public function isLibrarian(): bool
    {
        # code
        return $this->role == Role::librarian();
    }

}
