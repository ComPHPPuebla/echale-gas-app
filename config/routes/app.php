<?php

use \EchaleGas\Controller\IndexController;

$app->get('/', function() use ($app) {
	$controller = new IndexController();
	$app->render('app/index.html.twig', $controller->indexForm());
})->name('home');