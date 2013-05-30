<?php

/* =================
 * == routing.php ==
 * =================
 * C'est ici que sont définies les URLs principales du site, que l'on relie à
 * leur controller respectif.
 * ===============
 */

$app->get('/', function() use($app) {
	
	return $app->redirect($app['translator']->getLocale());
});

$locale_route = '{_locale}';

$app->mount($locale_route.'/', new App\Controllers\HomeController());
