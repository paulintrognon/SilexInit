<?php

/* =======================
 * ======= dev.php =======
 * =======================
 * Configuration uniquement version PREPROD
 * =======================
 */

$app['debug'] = true;

ini_set('display_errors', 1);
error_reporting(-1);

// Assetic
$app['assetic.enabled'] = false;

$app['monolog.level'] = Monolog\Logger::WARNING;

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'silex_init',
    'user'     => 'root',
    'password' => '',
);
