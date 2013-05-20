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
if (isset($app['assetic.enabled']) && $app['assetic.enabled']) {
	
	$app->register(new AsseticServiceProvider(), array(
		'assetic.options' => array(
			'debug'            => $app['debug'],
			'auto_dump_assets' => $app['debug'],
		)
	));

	$app['assetic.filter_manager'] = $app->share(
		$app->extend('assetic.filter_manager', function($fm, $app) {
			$fm->set('lessphp', new Assetic\Filter\LessphpFilter());

			return $fm;
		})
	);

	$app['assetic.asset_manager'] = $app->share(
		$app->extend('assetic.asset_manager', function($am, $app) {
			$am->set('styles', new Assetic\Asset\AssetCache(
				new Assetic\Asset\GlobAsset(
					$app['assetic.input.path_to_css'],
					array($app['assetic.filter_manager']->get('lessphp'))
				),
				new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
			));
			$am->get('styles')->setTargetPath($app['assetic.output.path_to_css']);

			$am->set('scripts', new Assetic\Asset\AssetCache(
				new Assetic\Asset\GlobAsset($app['assetic.input.path_to_js']),
				new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
			));
			$am->get('scripts')->setTargetPath($app['assetic.output.path_to_js']);

			return $am;
		})
	);
}

// UrlGenerator (de type ->bind("index.index");)
$app->register(new UrlGeneratorServiceProvider());

// Routage vers les controllers
require 'routing.php';
