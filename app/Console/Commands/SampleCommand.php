<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SampleCommand extends Command
{
    protected static $defaultName = 'your:command';

    protected function configure()
    {
        $this
            ->setDescription('Description of your command')
            ->setHelp('Help text for your command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Your command logic here
        $output->writeln('Command executed successfully!');
        
        return Command::SUCCESS;
    }
}
