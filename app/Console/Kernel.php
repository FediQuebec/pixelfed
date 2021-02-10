<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('fix:optimize')->hourly();
        $schedule->command('gc:media')->hourly();
        $schedule->command('horizon:snapshot')->everyFiveMinutes();
        $schedule->command('gc:story')->everyFiveMinutes();
        $schedule->command('gc:failedjobs')->dailyAt(3);
        $schedule->command('gc:passwordreset')->dailyAt('09:41');
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
}
