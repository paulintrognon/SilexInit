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
