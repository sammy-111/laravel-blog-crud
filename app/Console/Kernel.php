<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CreatePosts; // Import your custom command class

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // Define your scheduled commands here if needed
        // Example: $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        // Register your custom command explicitly if it's not autoloaded
        $this->registerCommand('posts:create');
    }

    /**
     * Register a custom command with Laravel's console application.
     *
     * @param  string  $command
     * @return void
     */
    public function registerCommand($command): void
    {
        // Register the command with Artisan
        $this->app->singleton($command, function ($app) use ($command) {
            return $app[$command];
        });

        $this->commands([$command]);
    }
}
