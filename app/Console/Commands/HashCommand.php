<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HashCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hash {text} {--U|uppercase}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the md5 hash of a text';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $text = $this->argument('text');
        $uppercase = $this->option('uppercase');

        $md5text = $uppercase ? strtoupper(md5($text)):md5($text);

        $this->info("md5('{$text}') = $md5text");
    }
}
