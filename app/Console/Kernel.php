<?php

namespace App\Console;

use App\Mail\KnjigaIzdata;
use App\Mail\KnjigaOtpisana;
use App\Mail\KnjigaVracena;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\ClosingReason;
use App\Models\Policy;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function ()
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
        })->daily();

        $schedule->call(function ()
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
        })->everyThreeMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'Europe/Belgrade';
    }
}
