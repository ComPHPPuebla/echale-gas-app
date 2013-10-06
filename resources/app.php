<?php
use \Slim\Views\TwigExtension;
use \Slim\Views\Twig;
use \EchaleGas\Twig\Extension\ZendFormExtension;
use \Zend\View\Renderer\PhpRenderer;
use \Zend\Form\View\HelperConfig;
use \Zend\View\HelperPluginManager;
use \Psr\Log\LogLevel;
use \Monolog\Handler\StreamHandler;
use \Monolog\Logger;

$app->container->singleton('twig', function(){

    $viewTig = new Twig();

    $viewTig->parserOptions = [
        'charset' => 'utf-8',
        'cache' => realpath('../views/cache'),
        'auto_reload' => true,
        'strict_variables' => false,
        'autoescape' => true,
    ];

    $viewTig->twigTemplateDirs = [
        realpath('../views'),
    ];

    $viewTig->parserExtensions = [
        new TwigExtension(),
    ];

    $renderer = new PhpRenderer();
    $renderer->setHelperPluginManager(new HelperPluginManager(new HelperConfig()));
    $zendFormHelper = new ZendFormExtension($viewTig->getEnvironment(), $renderer);

    $viewTig->getEnvironment()->registerUndefinedFunctionCallback($zendFormHelper);

    return $viewTig;
});

$app->container->singleton('log', function () {
    $logger = new Logger('echale-gas-app');
    $logger->pushHandler(new StreamHandler('../logs/app.log', LogLevel::DEBUG));

    return $logger;
});