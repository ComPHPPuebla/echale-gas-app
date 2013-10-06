<?php

namespace EchaleGas\ServiceClient;

use \Guzzle\Service\Description\ServiceDescription;
use \Guzzle\Service\Client;

abstract class RestClient
{
    /**
     * @var \Guzzle\Service\Client
     */
    protected $client;

    /**
     * @param \Guzzle\Service\Client $client
     */
    public function __construct(Client $client)
    {
        $this->setClient($client);
    }

    /**
     * @param string $pathToDescription
     */
    protected function initClient($pathToDescription)
    {
        $description = ServiceDescription::factory($pathToDescription);
        $this->getClient()->setDescription($description);
    }

    /**
     * @return \Guzzle\Service\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \Guzzle\Service\Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }
}