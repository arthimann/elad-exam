<?php
require_once 'vendor/autoload.php';

use App\Database\Connection;

/**
 * Bootstrap and connect to DB
 * */
Connection::connect();
Connection::getInstance()->setAsGlobal();
Connection::getInstance()->bootEloquent();
