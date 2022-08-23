<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model
{
    const RESERVED = 1;
    public static function reserved(){
        # code
        $status = ReservationStatus::findOrNew(self::RESERVED);
        if (!$status->id){
            $status->id = self::RESERVED;
            $status->name = 'Rezervisana';
            $status->save();
        }
        return $status;
    }

    const WAITING = 2;
    public static function waiting(){
        # code
        $status = ReservationStatus::findOrNew(self::WAITING);
        if (!$status->id){
            $status->id = self::WAITING;
            $status->name = 'Na cekanju';
            $status->save();
        }
        return $status;
    }

    const REJECTED = 3;
    public static function rejected(){
        # code
        $status = ReservationStatus::findOrNew(self::REJECTED);
        if (!$status->id){
            $status->id = self::REJECTED;
            $status->name = 'Odbijena';
            $status->save();
        }
        return $status;
    }

    const CLOSED = 4;
    public static function closed(){
        # code
        $status = ReservationStatus::findOrNew(self::CLOSED);
        if (!$status->id){
            $status->id = self::CLOSED;
            $status->name = 'Zatvorena';
            $status->save();
        }
        return $status;
    }


    use HasFactory;
    protected $table = 'reservationstatuses';
}
