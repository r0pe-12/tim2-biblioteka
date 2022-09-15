<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        # code
        return $this->belongsTo(Student::class);
    }

    public function book(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        # code
        return $this->belongsTo(Book::class);
    }
}
