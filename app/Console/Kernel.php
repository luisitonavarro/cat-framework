<?php

namespace App\Console;

use Illuminate\Container\Container;
use Illuminate\Contracts\Console\Kernel as KernelContract;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Kernel implements KernelContract
{
    protected $commands = [];

    public function __construct()
    {
        $this->commands = [
            // Registrar tus comandos aquí
            // Example: \App\Console\Commands\YourCommand::class,
            \App\Console\Commands\SampleCommand::class,
        ];
    }

    public function handle()
    {
        $input = new \Symfony\Component\Console\Input\ArgvInput();
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();

        $application = new \Symfony\Component\Console\Application();
        foreach ($this->commands as $command) {
            $application->add(new $command());
        }

        $application->run($input, $output);
    }
}
