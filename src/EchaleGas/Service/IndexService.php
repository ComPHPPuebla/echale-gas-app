<?php

namespace EchaleGas\Service;

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
	
	/**
     * @return \Mandragora\Form\CrudForm
     */
    protected function getForm()
    {
        if (!$this->form) {
            $this->form = $this->buildForm(require $this->formOptionsPath);
        }

        return $this->form;
    }
    
    public function getFormIndex()
    {
    	return array('form' => $this->getForm());
    }
}