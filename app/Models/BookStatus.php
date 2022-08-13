<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    const RESERVED = 1;
    public static function reserved(){
        # code
        $status = BookStatus::findOrNew(self::RESERVED);
        if (!$status->id){
            $status->id = self::RESERVED;
            $status->name = 'Izdata na osnovu rezervacije';
            $status->save();
        }
        return $status;
    }

    const BORROWED = 2;
    public static function borrowed(){
        # code
        $status = BookStatus::findOrNew(self::BORROWED);
        if (!$status->id){
            $status->id = self::BORROWED;
            $status->name = 'Izdata';
            $status->save();
        }
        return $status;
    }

    const RETURNED = 3;
    public static function returned(){
        # code
        $status = BookStatus::findOrNew(self::RETURNED);
        if (!$status->id){
            $status->id = self::RETURNED;
            $status->name = 'Vracena';
            $status->save();
        }
        return $status;
    }

    const RETURNED1 = 4;
    public static function returned1(){
        # code
        $status = BookStatus::findOrNew(self::RETURNED1);
        if (!$status->id){
            $status->id = self::RETURNED1;
            $status->name = 'Vracena sa prekoracenjem';
            $status->save();
        }
        return $status;
    }

    const FAILED = 5;
    public static function failed(){
        # code
        $status = BookStatus::findOrNew(self::FAILED);
        if (!$status->id){
            $status->id = self::FAILED;
            $status->name = 'Otpisana';
            $status->save();
        }
        return $status;
    }

    use HasFactory;
    protected $table = 'bookStatuses';
}
