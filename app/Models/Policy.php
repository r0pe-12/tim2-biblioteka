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
            $reservation->value = 15;
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
            $return->value = 30;
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

    const MAXBORROWS = 4;
    const MAXBORROWS_NAME = 'max_borrows';
    public static function maxBorrows(){
        # code
        $maxBorrows = Policy::findOrNew(Policy::MAXBORROWS);
        if (!$maxBorrows->id){
            $maxBorrows->id = Policy::MAXBORROWS;
            $maxBorrows->name = Policy::MAXBORROWS_NAME;
            $maxBorrows->value = 5;
            $maxBorrows->save();
        }
        return $maxBorrows;
    }

    const ALLOWMANYBOOKS = 5;
    const ALLOWMANYBOOKS_NAME = 'allow_many_books';
    public static function allowManyBooks(){
        # code
        $maxBorrows = Policy::findOrNew(Policy::ALLOWMANYBOOKS);
        if (!$maxBorrows->id){
            $maxBorrows->id = Policy::ALLOWMANYBOOKS;
            $maxBorrows->name = Policy::ALLOWMANYBOOKS_NAME;
            $maxBorrows->value = 0;
            $maxBorrows->save();
        }
        return $maxBorrows;
    }

    const PDF = 6;
    const PDF_NAME = 'send_pdf';
    public static function sendPdf(){
        # code
        $sendPdf = Policy::findOrNew(Policy::PDF);
        if (!$sendPdf->id){
            $sendPdf->id = Policy::PDF;
            $sendPdf->name = Policy::PDF_NAME;
            $sendPdf->value = 0;
            $sendPdf->save();
        }
        return $sendPdf;
    }

    use HasFactory;
    protected $fillable = ['name', 'value'];
}
