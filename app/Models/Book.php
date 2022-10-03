<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pageNum',
        'script_id',
        'language_id',
        'bookbind_id',
        'format_id',
        'publisher_id',
        'publishDate',
        'isbn',
        'samples',
        'borrowedSamples',
        'reservedSamples',
        'description'
    ];

//    many - many relation between authors and book
    public function authors(){
        # code
        return $this->belongsToMany(Author::class);
    }

//    many-many relation between categories and book
    public function categories(){
        # code
        return $this->belongsToMany(Category::class);
    }

//    many-many relation between genres and book
    public function genres(){
        # code
        return $this->belongsToMany(Genre::class);
    }

//    1-many relation between books and publishers
    public function publisher(){
        # code
        return $this->belongsTo(Publisher::class);
    }

//    1-many relation between books and scripts
    public function script(){
        # code
        return $this->belongsTo(Script::class);
    }

//    1-many relation between books ang languages
    public function lang(){
        # code
        return $this->belongsTo(Language::class, 'language_id');
    }

//    1-many relation between books and bookbinds
    public function bookBind(){
        # code
        return $this->belongsTo(BookBind::class, 'bookbind_id');
    }

//    1-many rel between books and reviews
    public function reviews(){
        # code
        return $this->hasMany(BookReview::class);
    }

//    1-many relation between books and formats
    public function format(){
        # code
        return $this->belongsTo(Format::class);
    }

//    1-many relation between books and photos
    public function photos(){
        # code
        return $this->hasMany(Galery::class);
    }
    public function cover(){
        # code
        if ($cover = $this->photos()->where('cover', '=', 1)->first()){
            return $cover->path;
        }
        return asset('img/book-cover-placeholder.png');
    }

//    1-many relation book-borrows
    public function borrows(){
        # code
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
            });

    }

//    sve vracene kopije jedne knjige
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

//    sve vracene otpisane jedne knjige
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

    public function failed(){
        # code
        return $this->borrows()
            ->join('book_borrow_status', 'borrows.id', '=', 'borrow_id')
            ->where(function ($query){
                $query->where('active', '=', '1')
                    ->where('book_borrow_status.bookStatus_id', '=', BookStatus::BORROWED)
                    ->where('return_date', '<', today('Europe/Belgrade'));
            })
            ->orWhere(function ($query){
                $query->where('active', '=', '1')
                    ->where('book_borrow_status.bookStatus_id', '=', BookStatus::RESERVED)
                    ->where('return_date', '<', today('Europe/Belgrade'));
            })
            ->get();
    }

    //    1-many relation book-reservations
    public function reservations(){
        # code
        return $this->hasMany(Reservation::class);
    }
    //    get all active reservations
    public function activeRes(){
        # code
        return $this->reservations()
            ->where('closingReason_id', '=', ClosingReason::OPEN)
            ->join('reservation_status', 'reservation_status.reservation_id', 'reservations.id')
            ->join('reservationstatuses', 'reservationstatuses.id', '=', 'reservation_status.resStatus_id')
            ->join('closingreasons', 'closingreasons.id', 'reservations.closingReason_id')
            ->select('reservations.*', 'reservation_status.datum', 'reservationstatuses.name as status', 'reservationstatuses.id as resStatus_id', 'closingreasons.name as cReason');
    }

//    sve trenutno NEaktivne rezervacije jedne knjige
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

    public function ableToBorrow(){
        # code
        $able = false;
        if ($this->samples - $this->borrowedSamples - $this->reservedSamples > 0) {
            $able = true;
        }
        return $able;
    }

    public function getPdfAttribute($path){
        # code
        if (is_null($path)) {
            return null;
        }
        if (str_contains($path, 'http://') || str_contains($path, 'https://')){
            return $path;
        }
        if ($path){
            return '/storage/pdf/' . $path;
        }

        return null;
    }

}
