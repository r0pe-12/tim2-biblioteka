<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RezervacijaIstekla extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Reservation
     */
    public $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        //
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->reservation->student->email)->view('mail.knjiga-rezervisanje.rezervacijaistekla');
    }
}
