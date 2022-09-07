<?php

namespace App\Console;

use App\Models\Book;
use App\Models\Reserve;
use Carbon\Carbon;
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
        $schedule->call(function () {
            $reserves = Reserve::where('reservation_date_final', Carbon::now()->format('Y-m-d'))->get();
            foreach ($reserves as $reserve) {
                $book = Book::find($reserve->book_id);
                $book->reserved = false;
                $book->save();
                $reserve->delete();
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
