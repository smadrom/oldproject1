<?php
declare(strict_types=1);

use Http\RequestFactory;

require __DIR__ . '/../vendor/autoload.php';

$request = RequestFactory::fromGlobals();
