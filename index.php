<?php

// Some fancy staff here.

use Request\RequestHandler;

require_once __DIR__ . '/vendor/autoload.php';

$request = new RequestHandler();
echo $request->handle();
die;