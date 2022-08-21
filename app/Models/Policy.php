<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    const RESERVATION = 1;
    const RESERVATION_NAME = 'reservation_deadline';
    public static function reservation(){
        # code
        $reservation = Policy::findOrNew(Policy::RESERVATION);
        if (!$reservation->id){
            $reservation->id = Policy::RESERVATION;
            $reservation->name = Policy::RESERVATION_NAME;
            $reservation->value = 0;
            $reservation->save();
        }
        return $reservation;
    }

    const RETURN = 2;
    const RETURN_NAME = 'return_deadline';
    public static function return(){
        # code
        $return = Policy::findOrNew(Policy::RETURN);
        if (!$return->id){
            $return->id = Policy::RETURN;
            $return->name = Policy::RETURN_NAME;
            $return->value = 0;
            $return->save();
        }
        return $return;
    }

    const CONFLICT = 3;
    const CONFLICT_NAME = 'conflict_deadline';
    public static function conflict(){
        # code
        $conflict = Policy::findOrNew(Policy::CONFLICT);
        if (!$conflict->id){
            $conflict->id = Policy::CONFLICT;
            $conflict->name = Policy::CONFLICT_NAME;
            $conflict->value = 0;
            $conflict->save();
        }
        return $conflict;
    }

    use HasFactory;
    protected $fillable = ['name', 'value'];
}
