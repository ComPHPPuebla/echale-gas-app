<?php
namespace EchaleGas\Service;

use \Guzzle\Plugin\Log\LogPlugin;
use \Guzzle\Log\MessageFormatter;
use \Guzzle\Log\MonologLogAdapter;
use \Monolog\Handler\StreamHandler;
use \Monolog\Logger;
use \Guzzle\Service\Description\ServiceDescription;
use \Guzzle\Service\Client;
use \EchaleGas\Service\ClientService;

class IndexService extends ClientService
{

	/**
	* \EchaleGas\Form\Form
	**/
	protected $form;

	protected $formOptionsPath;

	/**
     * Initialize form options and routes names
     */
    public function __construct()
    {
        $this->formOptionsPath = __DIR__.('/../../../config/index.php');
    }

    protected function getForm()
    {
        if (!$this->form) {
            $this->form = $this->buildForm(require $this->formOptionsPath);
        }

        return $this->form;
    }

    public function getIndexForm()
    {
        $client = $this->createEchaleGasClient();

    	return ['form' => $this->getForm(), 'stations' => $client->showStations()->toArray()];
    }

    public function createEchaleGasClient()
    {
        $client = new Client();
        $client->setDescription(ServiceDescription::factory('config/services/echalegas.json'));
        $logger = new Logger('debug');
        $logger->pushHandler(new StreamHandler('logs/debug.log'));
        $logPlugin = new LogPlugin(new MonologLogAdapter($logger), MessageFormatter::DEBUG_FORMAT);

        $client->addSubscriber($logPlugin);

        return $client;
    }
}