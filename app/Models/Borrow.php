<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = [
        'librarian_id',
        'student_id',
        'borrow_date',
        'return_date'
    ];

//    relation between borrows and librarian
    public function librarian(){
        # code
        return $this->belongsTo(User::class);
    }


//    relation between borrows and student
    public function student(){
        # code
        return $this->belongsTo(User::class);
    }

//    relation between borrows and book
    public function book(){
        # code
        return $this->belongsTo(Book::class);
    }

//    get hold time of book
    public function hold($unix=false){
        # code
        $hold = today('Europe/Belgrade')->timestamp - Carbon::parse($this->borrow_date)->timestamp;
        if ($unix){
            return $hold;
        }
        return Carbon::parse($hold);
    }

//    get all statuses of izdavanje knjige
    public function statuses(){
        # code
        return $this->belongsToMany(BookStatus::class, 'book_borrow_status', 'borrow_id', 'bookStatus_id')->withPivot('datum');
    }

//    sva izdavanja koja su trenutno aktivna
    public static function izdavanja(){
        # code
        return self
            ::join('book_borrow_status','borrows.id','=','borrow_id')
            ->where('book_borrow_status.bookStatus_id','=', BookStatus::BORROWED)
            ->get();
    }
}
