<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;

class TestCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function testJobToSearchableArray()
    {
        return Job::first()->toSearchableArray();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        dump($this->testJobToSearchableArray());
        return 0;
    }
}
