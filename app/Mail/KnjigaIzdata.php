<?php

namespace App\Mail;

use App\Models\Borrow;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KnjigaIzdata extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Borrow
     */
    public $borrow;

    /**
     * Create a new message instance.
     *
     * @param Borrow $borrow
     */
    public function __construct(Borrow $borrow)
    {
        //
        $this->borrow = $borrow;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->borrow->student->email)->view('mail.knjiga-izdavanje.knjigaizdata');
    }
}
