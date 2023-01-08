<?php

namespace App\Command\Login;

use App\Repositories\UserRepository;
use Minicli\Command\CommandController;

class DefaultController extends CommandController
{

    public function handle(): void
    {
        $user = $this->getParam('user');
        $password = $this->getParam('password');

        $loggedUser = (new UserRepository)->login($user, $password);

        if ($loggedUser['is_logged_in']) {
            $this->getPrinter()->info("User $user is loggged in. Session ID: " . $loggedUser['session_id']);
        } else {
            $this->getPrinter()->info("Sorry wrong user!");
        }

    }
}