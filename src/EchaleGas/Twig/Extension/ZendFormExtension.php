<?php
namespace EchaleGas\Twig\Extension;

use \Zend\View\Renderer\RendererInterface;
use \Twig_Environment as Environment;
use \Twig_SimpleFunction as SimpleFunction;

class ZendFormExtension
{
    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * @var Environment
     */
    protected $environment;

    /**
     * @var array
     */
    protected $helpers;

    /**
     * @param Environment $environment
     * @param RendererInterface $renderer
     */
    public function __construct(Environment $environment, RendererInterface $renderer)
    {
        $this->environment = $environment;
        $this->renderer = $renderer;
        $this->helpers = array();
    }

    /**
     * @param string $name
     * @return SimpleFunction
     */
    public function registerFormFunction($name)
    {
        if (!isset($this->helpers[$name])) {

            $this->helpers[$name] = new SimpleFunction(
                $name, array($this->renderer, $name), array('is_safe' => array('html'))
            );
        }

        return $this->helpers[$name];
    }

    /**
     * Register a form view helper as a Twig function
     *
     * @param string $name
     * @return SimpleFunction
     */
    public function __invoke($name)
    {
        return $this->registerFormFunction($name);
    }
}