<?php


namespace App\Service;


use App\Commands\Command;

class CrawlerInvoker
{
    private array $commands = [];

    public function setCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function run()
    {
//        $this->commands->execute();
    }
}
