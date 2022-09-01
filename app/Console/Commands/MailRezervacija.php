<?php

namespace App\Console\Commands;

use App\Mail\KnjigaRezervisana;
use App\Models\Reservation;
use Illuminate\Console\Command;

class MailRezervacija extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:rezervacija';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $toSendMail = Reservation::where('mail', '=', '0')->get();
        foreach ($toSendMail as $res) {
            try {
                \Mail::send(new KnjigaRezervisana($res));
            } catch (\Exception $e) {

            } finally {
                $res->mail = 1;
                $res->save();
            }
        }
    }
}
