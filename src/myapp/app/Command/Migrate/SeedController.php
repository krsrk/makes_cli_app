<?php

namespace App\Command\Migrate;

use App\Utils\Migrations\DatabaseSeeder;
use Minicli\Command\CommandController;

class SeedController extends CommandController
{

    public function handle(): void
    {
        $this->getPrinter()->info('Start seeding the database');
        (new DatabaseSeeder)->run();
        $this->getPrinter()->info('Seeding database succesfully');
    }
}