<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-generate all ide-helpers';

    /**
     * Create a new command instance.
     *
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
        $bar = $this->output->createProgressBar(5);

        $this->line('');
        $this->info('**********************************');
        $this->info('  Re-generating ide-helper files  ');
        $this->info('**********************************');
        $this->line('');

        $this->callSilent('clear-compiled');

        $bar->advance();
        $this->callSilent('ide-helper:generate');

        $bar->advance();
        $this->callSilent('ide-helper:models', ['--write' => 'yes']);

        $bar->advance();
        $this->callSilent('ide-helper:meta');

        $bar->advance();
        $this->callSilent('optimize');

        $bar->finish();
        $this->line('');
        $this->info('ide-helper files regenerated');
    }
}
