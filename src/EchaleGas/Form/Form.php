<?php

namespace EchaleGas\Form;

use Zend\Form\Form as ZendForm;

class Form extends ZendForm
{
	/**
     * @return Form
     */
    public function prepareForCreating()
    {
        return $this;
    }

    /**
     * @return Form
     */
    public function prepareForEditing()
    {
        return $this;
    }
}