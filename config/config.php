<?php

/* =======================
 * == configuration.php ==
 * =======================
 * Ce fichier va être à l'avenir généré par build-config.php
 * =======================
 */

/*
 * CONSTANTES
 */
define('ROOT_PATH',			realpath(__DIR__.'/../').'/');

/*
 * TYPE DE VERSION
 */
$app['debug'] = true;

ini_set('display_errors', 1);
error_reporting(-1);

/*
 * CONFIGURATION DU SERVEUR
 */
ini_set('date.timezone', 'Europe/Paris');

// Local
$app['locale'] = 'fr';
$app['session.default_locale'] = $app['locale'];

/*
 * CONFIGURATION DES REPERTOIRES
 */

// Cache
$app['cache.path'] = ROOT_PATH . 'cache';

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';

// Assetic
$app['assetic.enabled']              = true;
$app['assetic.path_to_cache']        = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web']          = ROOT_PATH . 'web';
$app['assetic.input.path_to_assets'] = ROOT_PATH . 'ressources/assets';

$app['assetic.input.path_to_css']       = $app['assetic.input.path_to_assets'] . '/less/*.less';
$app['assetic.output.path_to_css']      = 'css/styles.css';

$app['assetic.input.path_to_js']        = $app['assetic.input.path_to_assets'] . '/js/*.js';
$app['assetic.output.path_to_js']       = 'js/scripts.js';
