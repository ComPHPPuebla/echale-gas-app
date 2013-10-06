<?php

return array(
    'type' => 'EchaleGas\Form\IndexForm',
    'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
    'attributes' => array(
        'method' => 'post',
        'id' => 'index-form',
        'class' => 'form-horizontal',
    ),
    'elements' => array(
        array(
            'spec' => array(
                'name' => 'username',
                'options' => array(
                    'label' => 'Nombre de usuario',
                ),
                'attributes' => array(
                    'size' => 45,
                    'maxlength' => 20,
                    'required' => true,
                ),
                'type'  => 'Text',
            )
        ),
        array(
            'spec' => array(
                'name' => 'csrf',
                'type' => 'Csrf',
            ),
        ),
        array(
            'spec' => array(
                'name' => 'send',
                'options' => array(
                    'label' => 'Guardar',
                ),
                'attributes' => array(
                    'type' => 'submit',
                    'value' => 'Guardar',
                ),
                'type'  => 'Button',
            ),
        ),
    ),
    'input_filter' => array(
        'username' => array(
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StringTrim'),
                array('name' => 'Zend\Filter\StripTags'),
            ),
        ),
    ),
);