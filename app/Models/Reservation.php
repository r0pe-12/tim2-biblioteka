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

    /**
     * Get all of the models from the database.
     *
     * @param  array|string  $columns
     * @return Reservation
     */
    public static function allOrdered($columns = ['*'])
    {
        return self
            ::join('reservation_status','reservation_status.reservation_id','=','reservations.id')
            ->join('reservationstatuses', 'reservation_status.resStatus_id', '=', 'reservationstatuses.id')
            ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
            ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as status_id', 'closingreasons.name as cReason')
            ->orderBy('datum', 'desc');
    }

//    relation between reservation and librarian
    public function librarian(){
        # code
        return $this->belongsTo(User::class);
    }

//    relation between reservation and closingreason
    public function closingReason(){
        # code
        return $this->belongsTo(ClosingReason::class, 'closingReason_id');
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
    public function statuses(){
        # code
        return $this->belongsToMany(ReservationStatus::class, 'reservation_status', 'reservation_id', 'resStatus_id')->withPivot('datum');
    }

//    get last reservation status
    public function status(){
        # code
        return $this->statuses()->latest()->first();
    }


//    get closingReason of rezervacija knjige
    public function cReason(){
        # code
        return $this->belongsTo(ClosingReason::class, 'closingReason_id');
    }

//    sve trenutno aktivne rezervacije
    public static function active(){
        # code
        return Reservation::where('closingReason_id', '=', ClosingReason::OPEN)
            ->join('reservation_status', 'reservation_status.reservation_id', 'reservations.id')
            ->join('reservationstatuses', 'reservationstatuses.id', '=', 'reservation_status.resStatus_id')
            ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
            ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as resStatus_id', 'closingreasons.name as cReason');
    }

//    sve trenutno NEaktivne rezervacije
    public static function archive(){
        # code
        return Reservation
            ::join('reservation_status', 'reservation_status.reservation_id', 'reservations.id')
            ->join('reservationstatuses', 'reservationstatuses.id', '=', 'reservation_status.resStatus_id')
            ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
            ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as resStatus_id', 'closingreasons.name as cReason')
            ->where(function ($q){
                $q->where('resStatus_id', '!=', ReservationStatus::RESERVED)
                    ->where('resStatus_id', '!=', ReservationStatus::WAITING);
            });
    }

    public function isActive(){
        # code
        if ($this->status()->id == ReservationStatus::RESERVED) {
            return true;
        }
        return false;
    }
}
