<?php
namespace EchaleGas\Service;

use \EchaleGas\ServiceClient\RestClient;
use \Zend\Form\Factory;

abstract class ClientService
{
    /**
     * @var \EchaleGas\ServiceClient\RestClient
     */
    protected $client;
    
    /**
     * @var Factory
     */
    protected $formFactory;

    /**
     * @return \EchaleGas\ServiceClient\RestClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \EchaleGas\ServiceClient\RestClient
     */
    public function setClient(RestClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * @param array $spec
     * @return \Zend\Form\FormInterface
     */
    protected function buildForm(array $spec)
    {
        if (!$this->formFactory) {
            $this->formFactory = new Factory();
        }

        return $this->formFactory->create($spec);
    }
}