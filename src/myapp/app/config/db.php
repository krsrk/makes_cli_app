<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => env_var('DB_DRIVER', 'mysql'),
    'host'      => env_var('DB_HOST', 'localhost'),
    'database'  => env_var('DB_DATABASE', 'database'),
    'username'  => env_var('DB_USER', 'root'),
    'password'  => env_var('DB_PASSWORD', 'password'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();