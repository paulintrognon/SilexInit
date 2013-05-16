<?php

/* =======================
 * == configuration.php ==
 * =======================
 * Ce fichier va être à l'avenir généré par build-config.php
 * =======================
 */

$app['debug'] = true;

ini_set('date.timezone', 'Europe/Paris');

ini_set('display_errors', 1);
error_reporting(-1);

$app['assetic.path_to_web'] = __DIR__ . '/assets';

