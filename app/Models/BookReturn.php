<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReturn extends Borrow
{
    use HasFactory;
    protected $table = 'borrows';

//    sve vracene knjige
    public static function returned(){
        # code
        return self
            ::where('active', '=', '0')
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED)
            ->orwhere('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED1)
            ->get();
    }
}
