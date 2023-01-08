<?php
use App\Utils\Configuration\Env;

if (! function_exists('env_var')) {
    function env_var(string $varName, $fallBackValue = '')
    {
        $envVarValue = $fallBackValue;

        if (! empty($_ENV[$varName])) {
            $checkIfValIsBool = Env::checkIfValueIsBoolean($_ENV[$varName]);
            $envVarValue = ($checkIfValIsBool['result']) ? $checkIfValIsBool['value'] : $_ENV[$varName];
        }

        return $envVarValue;
    }
}

if (! function_exists('base_dir')) {
    function base_dir() : string
    {
        return env_var('BASE_DIR', '/var/app/');
    }
}

if (! function_exists('app_dir')) {
    function app_dir() : string
    {
        return env_var('BASE_DIR', '/var/app/') . 'app/';
    }
}