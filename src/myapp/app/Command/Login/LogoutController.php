<?php

namespace App\Command\Login;

use App\Models\User;
use App\Repositories\UserRepository;
use Minicli\Command\CommandController;

class LogoutController extends CommandController
{

    public function handle(): void
    {
        (new UserRepository())->logout();
        $this->getPrinter()->info('User logged out successfully');
    }
}