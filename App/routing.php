<?php

/* =================
 * == routing.php ==
 * =================
 * C'est ici que sont définies les URLs principales du site, que l'on relie à
 * leur controller respectif.
 * ===============
 */

$app->mount("/", new App\Controllers\HomeController());
$app->mount("/execute", new App\Controllers\ExecuteController());
