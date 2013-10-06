<?php

use \EchaleGas\Controller\IndexController;

$app->get('/', function() use ($app) {
	$controller = new IndexController();
	$app->render('app/index.html.twig', $controller->indexForm());
})->name('home');

$app->get('/gasolineras', function() use ($app) {
	$controller = new IndexController();
	$app->render('app/gas-station.html.twig', $controller->indexForm());
})->name('gas-station');