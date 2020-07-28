<?php
require '../autoload.php';
session_start();

$routes = new \wuc\Routes();

$entryPoint = new \CSY2028\EntryPoint($routes);

$entryPoint->run();