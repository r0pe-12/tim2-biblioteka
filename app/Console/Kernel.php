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
        $schedule->command('check:rezervacijaIstekla')->daily();

        $schedule->command('mail:izdavanje')->everyMinute();

        $schedule->command('mail:rezervacija')->everyMinute();
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
