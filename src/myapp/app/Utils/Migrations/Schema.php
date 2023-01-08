<?php
namespace App\Utils\Migrations;

use App\Repositories\MakeRepository;
use App\Utils\Configuration\DbConfig;

class Schema
{
    private $db;
    private $schema;

    public function __construct()
    {
        $dbConfig = (new DbConfig())->connect();
        $this->schema = $dbConfig->schema();
        $this->db = $dbConfig->db();
    }

    public function create()
    {
        $this->schema->create('users', function ($table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });

        $this->schema->create('makes', function ($table) {
            $table->increments('id');
            $table->integer('make_id');
            $table->string('make_name');
            $table->string('make_slug');
            $table->timestamps();
        });

        $this->schema->create('models', function ($table) {
            $table->increments('id');
            $table->integer('model_id');
            $table->string('model_name');
            $table->string('model_year');
            $table->timestamps();
        });

        $this->schema->create('vehicle_types', function ($table) {
            $table->increments('id');
            $table->integer('vehicle_type_id');
            $table->string('vehicle_type_name');
            $table->string('vehicle_type_slug');
            $table->timestamps();
        });

        $this->schema->create('make_vehicle_types', function ($table) {
            $table->increments('id');
            $table->integer('make_id');
            $table->integer('vehicle_type_id');
            $table->timestamps();
        });

        $this->schema->create('make_models', function ($table) {
            $table->increments('id');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->timestamps();
        });

        $this->schema->create('make_models_vehicles_types', function ($table) {
            $table->increments('id');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->integer('vehicle_type_id');
            $table->timestamps();
        });

        $this->schema->create('sys_logs', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('log_description');
            $table->timestamps();
        });

        $this->schema->create('sessions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('active');
            $table->timestamps();
        });

        $this->db::statement((new MakeRepository)->createView());
    }
}