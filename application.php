<?php
chdir(__DIR__);

require 'vendor/autoload.php';

use \Slim\Slim;

$app = new Slim(require 'config/app.config.php');
$app->setName('Échale Gas');

require 'resources/app.php';

$app->view($app->twig);

require 'routes/app.php';