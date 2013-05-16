<?php

/* =============
 * == app.php ==
 * =============
 * Initiation de l'application Silex
 * C'est là qu'on ajoute et configure tous les modules ajoutés à Silex
 * ===============
 */

use SilexAssetic\AsseticServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

// Twig
$app->register(new TwigServiceProvider(), array(
    "twig.path" => dirname(__DIR__) . "/ressources/Views",
    'twig.options' => array('cache' => dirname(__DIR__).'/cache', 'strict_variables' => true)
));

// Assets (via Assetic)
$app->register(new AsseticServiceProvider(), array(
	'assetic.options' => array(
		'debug'            => $app['debug'],
		'auto_dump_assets' => $app['debug'],
	)
));

// UrlGenerator (de type ->bind("index.index");)
$app->register(new UrlGeneratorServiceProvider());

// Routage vers les controllers
require 'routing.php';
