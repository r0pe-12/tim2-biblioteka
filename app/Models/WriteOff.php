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
        return WriteOff::all()->where('return_date', '<=', today('Europe/Belgrade'))->all();
    }


}
