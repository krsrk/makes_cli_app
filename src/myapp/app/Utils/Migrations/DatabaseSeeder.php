<?php

namespace App\Utils\Migrations;

use App\Utils\Migrations\Seeders\MakeSeeder;
use App\Utils\Migrations\Seeders\UserSeeder;

class DatabaseSeeder
{
    public function run()
    {
        (new UserSeeder())->run();
        (new MakeSeeder())->run();
    }
}