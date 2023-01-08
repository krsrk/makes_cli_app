<?php

namespace App\Command\Report;

use App\Repositories\UserRepository;
use App\Utils\Files\FileManager;
use Minicli\Command\CommandController;

class SaveController extends CommandController
{

    public function handle(): void
    {
        if (! (new UserRepository)->isUserLoggedIn()) {
            $this->getPrinter()->display('You must logged in');
            return;
        }

        $saveFile = (new FileManager())->putFile( base_dir() . 'make_report.xlsx', 'make_report.xlsx');

        if (! empty($saveFile)) {
            $this->getPrinter()->info('File Report upload succesfully!');
        }

    }
}