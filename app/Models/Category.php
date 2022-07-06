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
        return 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO';
    }
}
