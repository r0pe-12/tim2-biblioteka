<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','iconPath', 'description'];

    public function getIconPathAttribute($path){
        # code
        if (strpos($path, 'http://') !== FALSE || strpos($path, 'https://') !== FALSE){
            return $path;
        }
        if ($path){
            return '/storage/images/categories/' . $path;
        }
        return asset('img/settings.jpg');
    }

    public function books(){
        # code
        return $this->belongsToMany(Book::class);
    }
}
