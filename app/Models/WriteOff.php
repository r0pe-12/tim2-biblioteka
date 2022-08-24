<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteOff extends Borrow
{
    use HasFactory;

    protected $table = 'borrows';

    public static function prekoracene(){
        # code
        return self
            ::join('book_borrow_status', 'borrows.id', '=', 'borrow_id')
            ->where(function ($query){
                $query->where('active', '=', '1')
                    ->where('book_borrow_status.bookStatus_id', '!=', BookStatus::FAILED)
                    ->where('book_borrow_status.bookStatus_id', '=', BookStatus::BORROWED)
                    ->where('return_date', '<', today('Europe/Belgrade'));
            })
            ->orWhere(function ($query){
                $query->where('active', '=', '1')
                    ->where('book_borrow_status.bookStatus_id', '!=', BookStatus::FAILED)
                    ->where('book_borrow_status.bookStatus_id', '=', BookStatus::RESERVED)
                    ->where('return_date', '<', today('Europe/Belgrade'));
            })
            ->get();
    }
}
