<?php
namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class ModelV extends Model
{
    protected $table = 'models';
    public $timestamps = true;
}