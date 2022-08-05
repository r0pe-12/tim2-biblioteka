<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'biography',
        'image'
    ];

    public function getImageAttribute($path){
        # code
        if (strpos($path, 'http://') !== FALSE || strpos($path, 'https://') !== FALSE){
            return $path;
        }
        if ($path){
            return '/storage/images/authors/' . $path;
        }
        return asset('img/profile.jpg');
    }
}
