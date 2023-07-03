<?php


namespace App\Service;


use App\Commands\Command;

class CrawlInvoker
{
    private Command $command;

    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    public function run()
    {
        $this->command->execute();
    }
}
