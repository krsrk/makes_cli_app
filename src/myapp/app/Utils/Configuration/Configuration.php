<?php
namespace App\Utils\Configuration;

interface Configuration
{
    public function load();

    public function getDotEnv();
}