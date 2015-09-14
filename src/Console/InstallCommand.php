<?php

namespace Laravel\SparkInstaller\Console;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this->setName('install')
                ->setDescription('Install Laravel Spark into the current project.');
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	passthru('composer require laravel/spark');

    	copy(__DIR__.'/stubs/app.php', getcwd().'/config/app.php');

    	passthru('php artisan spark:install');
    }
}
