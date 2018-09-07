<?php

namespace Laraboot\Console\Commands;

use Illuminate\Console\Command;

class LarabootInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laraboot:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the laraboot configuration and view files to your project.';

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
        // Generate authentication scaffolding.
        $this->callSilent('make:auth', [
            '--no-interaction' => true,
        ]);

        // Publish the laraboot files.
        $this->callSilent('vendor:publish', [
            '--tag' => 'laraboot-scaffolding',
            '--force' => '--force',
        ]);

        $this->info('laraboot was installed successfully.');
    }
}
