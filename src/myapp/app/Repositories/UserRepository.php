<?php
namespace App\Repositories;

use App\Models\Sessions;
use App\Models\User;

class UserRepository
{
    public function login(string $user, string $password)
    {
        $loggedUser = User::query()->where('username', '=', $user)
            ->where('password', '=', $password)
            ->first();

        if (! $loggedUser) {
            return [
                'session_id' => '',
                'is_logged_in' => false,
            ];
        }

        $newSession = new Sessions();
        $newSession->user_id = $loggedUser->id;
        $newSession->active = true;
        $newSession->created_at = date('Y-m-d H:i:s');
        $newSession->save();

        return [
            'session_id' => $newSession->id,
            'is_logged_in' => true,
        ];
    }

    public function logout()
    {
        $session = Sessions::query()->first();
        $session->active = false;
        $session->save();
    }

}