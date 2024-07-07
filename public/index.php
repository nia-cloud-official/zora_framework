<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Src\Controllers\TestController;

$controller = new TestController();
$controller->handleRequest();
