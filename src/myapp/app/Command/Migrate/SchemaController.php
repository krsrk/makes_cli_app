<?php

namespace App\Command\Migrate;

use App\Utils\Migrations\Schema;
use Minicli\Command\CommandController;

class SchemaController extends CommandController
{

    public function handle(): void
    {
        $this->getPrinter()->info('Start creating the schemas');
        (new Schema)->create();
        $this->getPrinter()->info('Schemas created succesfully');
    }
}