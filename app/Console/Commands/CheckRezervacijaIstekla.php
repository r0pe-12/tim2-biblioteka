<?php

namespace App\Console\Commands;

use App\Models\ClosingReason;
use App\Models\Policy;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use Illuminate\Console\Command;

class CheckRezervacijaIstekla extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:rezervacijaIstekla';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if reservation is expired if it is we change the status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $res_deadline = Policy::reservation()->value;
        foreach (Reservation::active()->get() as $res) {
            if (\Carbon\Carbon::parse($res->submttingDate)->addDays($res_deadline) < today('Europe/Belgrade')) {
                $res->closingReason_id = ClosingReason::expired()->id;
                $res->closingDate = today("Europe/Belgrade");
                $res->save();

                $newResStatus = ReservationStatus::closed();
                $res->statuses()->attach($newResStatus);

                $res->book->reservedSamples--;
                $res->book->save();
            };
        }
    }
}
