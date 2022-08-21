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
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where('book_borrow_status.bookStatus_id','=', BookStatus::BORROWED)
            ->orWhere('book_borrow_status.bookStatus_id','=', BookStatus::RESERVED)
            ->get();
    }

    public function returned(){
        # code
        return $this->borrows()
            ->join('book_borrow_status','borrows.id','=','borrow_id')
            ->where('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED)
            ->orwhere('book_borrow_status.bookStatus_id','=', BookStatus::RETURNED1)
            ->get();
    }
    public function prekoracene(){
        # code
        return $this->borrows()
            ->join('book_borrow_status', 'borrows.id', '=', 'borrow_id')
            ->where('book_borrow_status.bookStatus_id', '!=', BookStatus::FAILED)
            ->where(function ($query){
                $query->where('book_borrow_status.bookStatus_id', '=', BookStatus::BORROWED)
                    ->where('return_date', '<', today('Europe/Belgrade'));
            })
            ->orWhere(function ($query){
                $query->where('book_borrow_status.bookStatus_id', '=', BookStatus::RESERVED)
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
                ->where('status_id', '=', ReservationStatus::RESERVED)->get();
    }

    public function archiveRes(){
        # code
        return $this->reservations()
                ->where(function ($q){
                    $q->where('status_id', '!=', ReservationStatus::RESERVED)
                        ->where('status_id', '!=', ReservationStatus::WAITING);
                })
                    ->get();
    }
}
