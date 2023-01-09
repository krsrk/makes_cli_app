<?php

namespace App\Repositories;

use App\Models\SysLog;

class SysLogRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new SysLog;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(int $userId, string $description)
    {
        $sysLog = new $this->model;
        $sysLog->user_id = $userId;
        $sysLog->log_description = $description;
        $sysLog->save();

        return $sysLog;
    }
}