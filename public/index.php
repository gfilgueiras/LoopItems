<?php
/* ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗
/* ║       _____                                      _____                   _                          ║ */
/* ║      / ___ \       _                            (____ \                 | |                         ║ */
/* ║     | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____  ║ */
/* ║     | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___) ║ */
/* ║     | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |     ║ */
/* ║      \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|     ║ */
/* ║                             |_|                                                 |_|                 ║ */
/* ║                                                                                                     ║ */
/* ║   Last update: 07/08/2025 22:47:14                                                                  ║ */
/* ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Project:     Sou Nail Desing                                                                      ║ */
/* ║                                                                                                     ║ */
/* ║   Author:      Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Created at:  07/08/2025 22:47:14                                                                  ║ */
/* ║   License:     MIT                                                                                  ║ */
/* ║   Copyright:   2025 Octopus Developer                                                               ║ */
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */


declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Request::capture());
