<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pageNum',
        'script_id',
        'bookbind_id',
        'format_id',
        'publisher_id',
        'publishDate',
        'isbn',
        'samples',
        'borrowedSaples',
        'reservedSamples',
        'description'
    ];

//    many - many relation between authors and book
    public function authors(){
        # code
        return $this->belongsToMany(Author::class);
    }

//    many-many relation between categories and book
    public function categories(){
        # code
        return $this->belongsToMany(Category::class);
    }

//    many-many relation between genres and book
    public function genres(){
        # code
        return $this->belongsToMany(Genre::class);
    }
}
