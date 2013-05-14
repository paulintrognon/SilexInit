<?php

//On initialise le timeZone
ini_set('date.timezone', 'Europe/Brussels');

//On ajoute l'autoloader
$loader = require_once __DIR__ . '/../vendor/autoload.php';

//dans l'autoloader nous ajoutons notre répertoire applicatif 
$loader->add("App",dirname(__DIR__));


//Nous instancions un objet Silex\Application
$app = new Silex\Application();

//en dev, nous voulons voir les erreurs
$app['debug'] = true;

//On indique où allez pour le chemin http://localhost/SilexSkeleton/public/
$app->mount("/", new App\Controllers\IndexController());

//On lance l'application
$app->run();
