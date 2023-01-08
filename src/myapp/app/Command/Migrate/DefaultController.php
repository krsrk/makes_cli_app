<?php

namespace App\Command\Migrate;

use Minicli\Command\CommandController;

class DefaultController extends CommandController
{

    public function handle(): void
    {
        $this->getPrinter()->info('Run ./minicli help for usage help.');
    }
}