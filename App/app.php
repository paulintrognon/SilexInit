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
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;

// Basic services
$app->register(new SessionServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new HttpCacheServiceProvider());

// Twig
$app->register(new TwigServiceProvider(), array(
    "twig.path" => dirname(__DIR__) . "/ressources/Views",
    'twig.options' => array(
		'cache' => isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
		'strict_variables' => true
	)
));

// Translation
$app->register(new TranslationServiceProvider(), array(
	'locale_fallback' => $app['locale'],
));
$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

	foreach($app['other_locales'] as $other_locale) {
		$translator->addResource('yaml', dirname(__DIR__) . '/ressources/locales/' . $other_locale . '.yml', $other_locale);
	}

    return $translator;
}));

// Monolog
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../log/app.log',
    'monolog.name'    => 'app',
    'monolog.level'   => $app['monolog.level']
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

// Routage vers les controllers
require 'routing.php';
