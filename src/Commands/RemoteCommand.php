<?php

namespace mukeshtilokani\Remote\Commands;

use Illuminate\Console\Command;
use Spatie\Ssh\Ssh;

class RemoteCommand extends Command
{
    public $signature = 'remote {command}';

    public $description = 'Execute commands on a remote server';

    public function handle(): int
    {
        $process = Ssh::create('mukesh', '203.109.103.178')
                        ->onOutput(function($type, $line) {
                            echo $line;
                        })
                        ->execute($this->getCommandToExeute());
    }

    protected function getCommandToExecute(): string
    {
        return $this->argument('command');
    }
}
