<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon'];

    public function getIconAttribute($path){
        # code
        if (strpos($path, 'http://') !== FALSE || strpos($path, 'https://') !== FALSE){
            return $path;
        }
        if ($path){
            return '/storage/images/genres/' . $path;
        }
        return 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO';


    }
    }
