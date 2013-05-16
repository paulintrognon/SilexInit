<?php

use SilexAssetic\AsseticServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

/*
 * CONFIGUTATIONS
 * --------------
 */

ini_set('date.timezone', 'Europe/Paris');

/*
 * LOADER
 * ------
 */

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add("App",dirname(__DIR__));

/*
 * APPLICATION
 * -----------
 */

$app = new Silex\Application();
$app['debug'] = true;

// Twig
$app->register(new TwigServiceProvider(), array(
    "twig.path" => dirname(__DIR__) . "/App/Views",
    'twig.options' => array('cache' => dirname(__DIR__).'/cache', 'strict_variables' => true)
));

// Assets (via Assetic)
$app['assetic.path_to_web'] = __DIR__ . '/assets';
$app->register(new AsseticServiceProvider(), array(
	'assetic.options' => array(
		'debug'            => $app['debug'],
		'auto_dump_assets' => $app['debug'],
	)
));

// UrlGenerator (de type ->bind("index.index");)
$app->register(new UrlGeneratorServiceProvider());

/*
 * ROUTAGE VERS LES CONTROLLERS
 * ----------------------------
 */
$app->mount("/", new App\Controllers\IndexController());

// Lancement ! :)
$app->run();
