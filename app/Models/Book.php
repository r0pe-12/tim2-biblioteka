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
        'language_id',
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

//    1-many relation between books and publishers
    public function publisher(){
        # code
        return $this->belongsTo(Publisher::class);
    }

//    1-many relation between books and scripts
    public function script(){
        # code
        return $this->belongsTo(Script::class);
    }

//    1-many relation between books ang languages
    public function lang(){
        # code
        return $this->belongsTo(Language::class, 'language_id');
    }

//    1-many relation between books and bookbinds
    public function bookBind(){
        # code
        return $this->belongsTo(BookBind::class, 'bookbind_id');
    }

//    1-many relation between books and formats
    public function format(){
        # code
        return $this->belongsTo(Format::class);
    }

//    1-many relation between books and photos
    public function photos(){
        # code
        return $this->hasMany(Galery::class);
    }
    public function cover(){
        # code
        if ($cover = $this->photos()->where('cover', '=', 1)->first()){
            return $cover->path;
        }
        return asset('img/book-cover-placeholder.png');
    }

//    1-many relation book-borrows
    public function borrows(){
        # code
        return $this->hasMany(Borrow::class);
    }
}
