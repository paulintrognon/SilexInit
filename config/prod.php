<?php

/* =======================
 * ====== prod.php =======
 * =======================
 * Configuration uniquement version PROD
 * =======================
 */

$app['debug'] = false;

ini_set('display_errors', 0);
error_reporting(0);

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
