<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// require_once __DIR__ . '/../app/config.php';

$router = require '../routes/web.php';

$router->dispatch();
