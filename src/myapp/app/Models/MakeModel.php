<?php

namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class MakeModel extends Model
{
    protected $table = 'make_models';
    public $timestamps = true;
}