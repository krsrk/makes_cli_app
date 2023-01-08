<?php

namespace App\Command\Report;

use App\Middleware\CheckUserSession;
use App\Repositories\MakeRepository;
use App\Repositories\UserRepository;
use Minicli\Command\CommandController;
use Minicli\Output\Filter\ColorOutputFilter;
use Minicli\Output\Helper\TableHelper;

class DefaultController extends CommandController
{

    public function handle(): void
    {
        if (! (new UserRepository)->isUserLoggedIn()) {
            $this->getPrinter()->display('You must logged in');
            return;
        }

        $report = (new MakeRepository)->getReport();
        $this->getPrinter()->display('Makes Report');

        $table = new TableHelper();
        $table->addHeader(['Make', 'Model', 'Model Year', 'Vehicle Type']);

        foreach ($report as $re) {
            $table->addRow([$re->make, $re->model, $re->model_year, $re->vehicle_type]);
        }

        $this->getPrinter()->newline();
        $this->getPrinter()->rawOutput($table->getFormattedTable(new ColorOutputFilter()));
        $this->getPrinter()->newline();
    }
}