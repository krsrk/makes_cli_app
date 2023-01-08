<?php

namespace App\Command\Logs;

use App\Repositories\SysLogRepository;
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

        $sysLogs = (new SysLogRepository)->all();
        $this->getPrinter()->display('Log Events');

        $table = new TableHelper();
        $table->addHeader(['User', 'Description', 'Date']);

        foreach ($sysLogs as $sys) {
            $table->addRow(["$sys->user_id", $sys->log_description, "$sys->created_at"]);
        }

        $this->getPrinter()->newline();
        $this->getPrinter()->rawOutput($table->getFormattedTable(new ColorOutputFilter()));
        $this->getPrinter()->newline();

        (new SysLogRepository)->create(1, 'User queries the logs');
    }
}