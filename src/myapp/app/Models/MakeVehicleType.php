<?php
namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class MakeVehicleType extends Model
{
    protected $table = 'make_vehicle_types';
    public $timestamps = true;
}