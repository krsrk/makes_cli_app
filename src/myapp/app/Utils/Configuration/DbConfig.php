<?php
namespace App\Utils\Configuration;

use Illuminate\Database\Capsule\Manager as Capsule;

class DbConfig
{
    private $capsule;

    public function __construct()
    {
        $capsule = new Capsule;
        $this->capsule = $capsule;
    }

    public function connect()
    {
        $this->capsule->addConnection([
            'driver'    => env_var('DB_DRIVER', 'mysql'),
            'host'      => env_var('DB_HOST', 'db'),
            'database'  => env_var('DB_DATABASE', 'makes'),
            'port'      => env_var('DB_PORT', '3306'),
            'username'  => env_var('DB_USER', 'root'),
            'password'  => env_var('DB_PASSWORD', 'P@ssw0rd'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $this->capsule->setAsGlobal();

        $this->capsule->bootEloquent();

        return $this;
    }

    public function schema()
    {
        return $this->capsule::schema();
    }

    public function db()
    {
        return $this->capsule;
    }
}