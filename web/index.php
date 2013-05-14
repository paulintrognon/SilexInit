<?php

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
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    "twig.path" => dirname(__DIR__) . "/App/Views",
    'twig.options' => array('cache' => dirname(__DIR__).'/cache', 'strict_variables' => true)
));

// UrlGenerator (de type ->bind("index.index");)
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/*
 * ROUTAGE VERS LES CONTROLLERS
 * ----------------------------
 */
$app->mount("/", new App\Controllers\IndexController());

// Lancement ! :)
$app->run();
