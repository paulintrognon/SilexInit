<?php

/* =======================
 * ======= dev.php =======
 * =======================
 * Configuration uniquement version DEV
 * =======================
 */

$app['debug'] = true;

ini_set('display_errors', 1);
error_reporting(-1);

// Assetic
$app['assetic.enabled']              = true;
$app['assetic.path_to_cache']        = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web']          = ROOT_PATH . 'web';
$app['assetic.input.path_to_assets'] = ROOT_PATH . 'ressources/assets';

$app['assetic.input.path_to_css']       = $app['assetic.input.path_to_assets'] . '/less/*.less';
$app['assetic.output.path_to_css']      = 'css/styles.css';

$app['assetic.input.path_to_js']        = array(
	$app['assetic.input.path_to_assets'] . '/js/libs/*.js',
	$app['assetic.input.path_to_assets'] . '/js/*.js',
);
$app['assetic.output.path_to_js']       = 'js/scripts.js';

$app['monolog.level'] = Monolog\Logger::DEBUG;
