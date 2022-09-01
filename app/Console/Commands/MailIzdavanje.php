<?php

namespace App\Console\Commands;

use App\Mail\KnjigaIzdata;
use App\Mail\KnjigaOtpisana;
use App\Mail\KnjigaVracena;
use App\Models\BookStatus;
use App\Models\Borrow;
use Illuminate\Console\Command;

class MailIzdavanje extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:izdavanje';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'We check if mail column is 1 if it is we send the mail and change the mail column to 0';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $toSendMail = Borrow::where('mail', '=', '0')->get();
        foreach ($toSendMail as $borrow) {
            try {
                if ($borrow->active == 1) {
                    \Mail::send(new KnjigaIzdata($borrow));
                } elseif ($borrow->active == 0) {
                    if ($borrow->status()->id == BookStatus::FAILED) {
                        \Mail::send(new KnjigaOtpisana($borrow));
                    } else {
                        \Mail::send(new KnjigaVracena($borrow));
                    }
                }
            } catch (\Exception $e) {

            } finally {
                $borrow->mail = 1;
                $borrow->save();
            }
        }
    }
}
