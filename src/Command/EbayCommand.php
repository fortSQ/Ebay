<?php

namespace fortSQ\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EbayCommand extends Command
{
    protected function configure()
    {
        $this->setName('ebay');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        require __DIR__ . '/../../index.php';
    }
}