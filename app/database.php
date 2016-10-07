<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_DATABASE,
    'username' => DB_USER,
    'password' => DB_PASS,
    'charset' => 'Latin1',
    'collation' => 'latin1_general_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


