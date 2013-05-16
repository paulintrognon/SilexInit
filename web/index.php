<?php

/* ===============
 * == index.php ==
 * ===============
 * Point d'entré de l'application. C'est là que toutes les composantes se
 * regroupent !
 * ===============
 */

/*
 * LOADER
 * ------
 */

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add("App", dirname(__DIR__));

/*
 * APPLICATION
 * -----------
 */

$app = new Silex\Application();

// On inclu la configuration (générée au préalable par build-config.php)
require __DIR__.'/../config/config.php';

// On inclu l'application en temps que tel
require __DIR__.'/../App/app.php';

// Lancement ! :)
$app->run();
