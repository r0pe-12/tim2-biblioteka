<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingReason extends Model
{
    const EXPIRED = 1;
    public static function expired(){
        # code
        $status = ClosingReason::findOrNew(self::EXPIRED);
        if (!$status->id){
            $status->id = self::EXPIRED;
            $status->name = 'Rezervacija istekla';
            $status->save();
        }
        return $status;
    }

    const REJECTED = 2;
    public static function rejected(){
        # code
        $status = ClosingReason::findOrNew(self::REJECTED);
        if (!$status->id){
            $status->id = self::REJECTED;
            $status->name = 'Rezervacija odbijena';
            $status->save();
        }
        return $status;
    }

    const CANCELLED = 3;
    public static function cancelled(){
        # code
        $status = ClosingReason::findOrNew(self::CANCELLED);
        if (!$status->id){
            $status->id = self::CANCELLED;
            $status->name = 'Rezervacija otkazana';
            $status->save();
        }
        return $status;
    }

    const BOOK_BORROWED = 4;
    public static function bookBorrowed(){
        # code
        $status = ClosingReason::findOrNew(self::BOOK_BORROWED);
        if (!$status->id){
            $status->id = self::BOOK_BORROWED;
            $status->name = 'Knjiga izdata';
            $status->save();
        }
        return $status;
    }

    const OPEN = 5;
    public static function open(){
        # code
        $status = ClosingReason::findOrNew(self::OPEN);
        if (!$status->id){
            $status->id = self::OPEN;
            $status->name = 'Otvorena';
            $status->save();
        }
        return $status;
    }

    use HasFactory;
    protected $table = 'closingReasons';

//    relation between closingreason and reservations
    public function reservations(){
        # code
        return $this->hasMany(Reservation::class, 'closingReason_id');
    }
}
