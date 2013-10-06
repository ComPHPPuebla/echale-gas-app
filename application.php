<?php
require 'vendor/autoload.php';

use \Slim\Slim;
use \Slim\Views\Twig;
use \Slim\Views\TwigExtension;
use \Zend\View\HelperPluginManager;
use \Zend\View\Renderer\PhpRenderer;
use \Zend\Form\View\HelperConfig;
use \EchaleGas\Twig\Extension\ZendFormExtension;

$app = new Slim(require 'config/app.config.php');
$app->setName('App Hechale Gas');

$viewTig = new Twig();

$viewTig->parserOptions = array(
	'charset' => 'utf-8',
	'cache' => realpath('../views/cache'),
	'auto_reload' => true,
	'strict_variables' => false,
	'autoescape' => true,
);

$viewTig->twigTemplateDirs = array(
	realpath('../views')
);

$viewTig->parserExtensions = array(
	new TwigExtension()
);

$renderer = new PhpRenderer();
$renderer->setHelperPluginManager(new HelperPluginManager(new HelperConfig()));
$zendFormHelper = new ZendFormExtension($viewTig->getEnvironment(), $renderer);

$viewTig->getEnvironment()->registerUndefinedFilterCallback($zendFormHelper);

$app->view($viewTig);

require 'config/routes/app.php';