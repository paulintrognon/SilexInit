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
define('ROOT_PATH', realpath(__DIR__.'/../').'/');

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

/*
 * Adding prod or dev config depending of index.php configuration
 */

if(APP_IS_DEV) {
	require 'dev.php';
}
else {
	require 'prod.php';
}
