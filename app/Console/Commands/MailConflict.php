<?php

namespace App\Console\Commands;

use App\Mail\UcenikKonflikt;
use App\Models\Borrow;
use App\Models\Carbon;
use App\Models\Policy;
use App\Models\WriteOff;
use Illuminate\Console\Command;

class MailConflict extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:conflict';

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
//        todo odje treba ispisat logiku koja salje mejl kad treba
    }
}
