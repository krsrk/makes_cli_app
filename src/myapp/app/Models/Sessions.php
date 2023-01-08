<?php

namespace App\Models;

use App\Utils\Configuration\DbConfig;

(new DbConfig())->connect();

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = 'sessions';
    public $timestamps = true;
}