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

        $newSession = Sessions::firstOrCreate(['user_id' => $loggedUser->id], [
            'user_id' => $loggedUser->id,
            'active' => true,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $newSession->active = true;
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

    public function isUserLoggedIn() : bool
    {
        $result = true;
        $session = Sessions::query()->first();

        if (is_null($session)) {
            $result = false;
        } else {
            $result = $session->active;
        }

        return $result;
    }
}