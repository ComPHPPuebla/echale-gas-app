<?php
namespace EchaleGas\Form;

use \EchaleGas\Form\Form;

class IndexForm extends Form
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