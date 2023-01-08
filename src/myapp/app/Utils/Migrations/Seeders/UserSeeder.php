<?php

namespace App\Utils\Migrations\Seeders;

use App\Models\User;

class UserSeeder
{
    public function run()
    {
        User::insert([
            'username' => 'adm',
            'password' => 'P@ssW0rd'
        ]);
    }
}