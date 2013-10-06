<?php

namespace EchaleGas\Controller;

use \EchaleGas\Service\IndexService;

class IndexController
{
	protected $service;

	public function __construct()
	{
		$this->service = new IndexService();
	}

	public function indexForm()
	{
		return $this->service->getIndexForm();
	}
}