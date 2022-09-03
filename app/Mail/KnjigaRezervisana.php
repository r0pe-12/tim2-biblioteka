<?php

namespace App\Mail;

use App\Models\Policy;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KnjigaRezervisana extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Reservation
     */
    public $reservation;

    /**
     * @var Policy
     */
    public $res_deadline;

    /**
     * Create a new message instance.
     *
     * @param $reservation
     */
    public function __construct(Reservation $reservation)
    {
        //
        $this->reservation = $reservation;
        $this->res_deadline =  Policy::reservation();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->reservation->student->email)->view('mail.knjiga-rezervisanje.knjigarezervisana');
    }
}
