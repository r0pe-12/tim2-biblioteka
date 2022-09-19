<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\Types\This;

class Student extends User
{
    use HasFactory;
    protected $table = 'users';
    const ROLE = 2;
    public static function all($columns = ['*'])
    {
        return User::all()->where('role_id', Student::ROLE);
    }

    public function borrows(){
        return $this->hasMany(Borrow::class);
    }

    public function active(){
        # code
        return $this->borrows()
            ->where('active', '=', '1')
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where(function ($q) {
                $q->where('book_borrow_status.bookStatus_id','=', BookStatus::BORROWED)
                    ->orWhere('book_borrow_status.bookStatus_id','=', BookStatus::RESERVED);
            })
            ->get();
    }

    public function returned(){
        # code
        return $this->borrows()
            ->where('active', '=', '0')
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where(function ($q) {
                $q->where('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED)
                    ->orwhere('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED1);
            })
            ->get();
    }

    public function otpisane(){
        # code
        return $this->borrows()
            ->where('active', '=', '0')
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where(function ($q) {
                $q->where('book_borrow_status.bookStatus_id','=', BookStatus::FAILED);
            })
            ->get();
    }
    public function prekoracene(){
        # code
        return $this->borrows()
            ->join('book_borrow_status', 'borrows.id', '=', 'borrow_id')
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

    public function reservations(){
        # code
        return $this->hasMany(Reservation::class);
    }

    public function activeRes(){
        # code
        return $this->reservations()
                ->where('closingReason_id', '=', ClosingReason::OPEN)
                ->join('reservation_status', 'reservation_status.reservation_id', 'reservations.id')
                ->join('reservationstatuses', 'reservationstatuses.id', '=', 'reservation_status.resStatus_id')
                ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
                ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as resStatus_id', 'closingreasons.name as cReason');
    }

    public function archiveRes(){
        # code
        return $this->reservations()
                ->join('reservation_status', 'reservation_status.reservation_id', 'reservations.id')
                ->join('reservationstatuses', 'reservationstatuses.id', '=', 'reservation_status.resStatus_id')
                ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
                ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as resStatus_id', 'closingreasons.name as cReason')
                ->where(function ($q){
                    $q->where('resStatus_id', '!=', ReservationStatus::RESERVED)
                        ->where('resStatus_id', '!=', ReservationStatus::WAITING);
                });
    }

    public function ableToGet($book_id){
        # code
        $maxBorrows = Policy::maxBorrows();
        $borrows = $this->active()->count();

        $ableByBorrows = $maxBorrows->value > $borrows;

        if (Policy::allowManyBooks()->value != 1) {
            $ableByBooks = $this->active()->where('book_id', $book_id)->count() === 0;
        } else {
            $ableByBooks = true;
        }

        return $ableByBorrows && $ableByBooks;
    }
}
