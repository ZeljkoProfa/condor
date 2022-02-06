<?php

// Some fancy staff here.

use Request\RequestHandler;

require_once __DIR__ . '/vendor/autoload.php';

$request = new RequestHandler();
$request->handle();

die;