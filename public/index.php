<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/route.php';

//Load .env file
$dotenv = Dotenv\Dotenv::createImmutable('..', '.env');
$dotenv->load();
