<?php

require_once __DIR__.'/../vendor/autoload.php';

//Load .env file
$dotenv = Dotenv\Dotenv::createImmutable('..', '.env');
$dotenv->load();

require_once __DIR__.'/../app/route.php';
