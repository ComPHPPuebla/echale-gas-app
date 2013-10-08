<?php
return [
    'type' => 'EchaleGas\Form\IndexForm',
    'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
    'attributes' => [
        'method' => 'post',
        'id' => 'index-form',
        'class' => 'form-horizontal',
    ],
    'elements' => [
        [
            'spec' => [
                'name' => 'username',
                'options' => [
                    'label' => 'Nombre de usuario',
                ],
                'attributes' => [
                    'size' => 45,
                    'maxlength' => 20,
                    'required' => true,
                ],
                'type'  => 'Text',
            ]
        ],
        [
            'spec' => [
                'name' => 'csrf',
                'type' => 'Csrf',
            ],
        ],
        [
            'spec' => [
                'name' => 'send',
                'options' => [
                    'label' => 'Guardar',
                ],
                'attributes' => [
                    'type' => 'submit',
                    'value' => 'Guardar',
                ],
                'type'  => 'Button',
            ],
        ],
    ],
    'input_filter' => [
        'username' => [
            'required' => true,
            'filters'  => [
                ['name' => 'Zend\Filter\StringTrim'],
                ['name' => 'Zend\Filter\StripTags'],
            ],
        ],
    ],
];