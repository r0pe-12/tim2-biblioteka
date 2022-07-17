<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'cover'
    ];

    //    accessor for image
    public function getPathAttribute($path){
        # code
        if (strpos($path, 'http://') !== FALSE || strpos($path, 'https://') !== FALSE){
            return $path;
        }
        if ($path){
            return '/storage/images/books/' . $path;
        }
        return 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO';
    }
}
