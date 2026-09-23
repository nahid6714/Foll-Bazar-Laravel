<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../Fol-Bazar-Laravel/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../Fol-Bazar-Laravel/vendor/autoload.php';

$app = require_once __DIR__.'/../Fol-Bazar-Laravel/bootstrap/app.php';

$app->handleRequest(Request::capture());
