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
            ->where('book_borrow_status.bookStatus_id', '!=', BookStatus::FAILED)
            ->where('return_date', '<=', today('Europe/Belgrade'))
            ->get();
    }


}
