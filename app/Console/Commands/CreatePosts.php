<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:create {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create multiple posts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->argument('count');
        
        // Logic to create posts goes here

        $this->info("Successfully created {$count} posts.");

        return 0;
    }
}
