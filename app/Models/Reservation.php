<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;
//    protected $fillable = [
//        'librarian_id',
//        'student_id',
//        'borrow_date',
//        'return_date'
//    ];
protected $guarded = [];
    use HasFactory;

//    relation between reservation and librarian
    public function librarian(){
        # code
        return $this->belongsTo(User::class);
    }

//    relation between reservation and closingreason
    public function closingReason(){
        # code
        return $this->belongsTo(ClosingReason::class);
    }

//    relation between reservation and student
    public function student(){
        # code
        return $this->belongsTo(User::class);
    }

//    relation between reservation and book
    public function book(){
        # code
        return $this->belongsTo(Book::class);
    }

//    get status of rezervacija knjige
    public function status(){
        # code
        return $this->belongsTo(ReservationStatus::class);
    }

//    get closingReason of rezervacija knjige
    public function cReason(){
        # code
        return $this->belongsTo(ClosingReason::class, 'closingReason_id');
    }

//    sve trenutno aktivne rezervacije
    public static function active(){
        # code
        return Reservation::where('status_id', '=', ReservationStatus::RESERVED)->get();
    }

//    sve trenutno NEaktivne rezervacije
    public static function archive(){
        # code
        return Reservation::
            where(function ($q){
                $q->where('status_id', '!=', ReservationStatus::RESERVED)
                    ->where('status_id', '!=', ReservationStatus::WAITING);
            })
            ->get();
    }
}
