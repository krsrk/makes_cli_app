<?php
namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class MakeModelVehicleType extends Model
{
    protected $table = 'make_models_vehicles_types';
    public $timestamps = true;
}