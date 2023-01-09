<?php

namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class SysLog extends Model
{
    protected $table = 'sys_logs';
    public $timestamps = true;
}