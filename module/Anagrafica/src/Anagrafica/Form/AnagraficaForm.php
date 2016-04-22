<?php

namespace Anagrafica\Form;

use Zend\Form\Form;

class AnagraficaForm extends Form
{
    public function __construct()
    {
        parent::__construct('Anagrafica');
        $this->setAttribute('method', 'post');

        $this->add([
            'name'       => 'codice',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Codice Cliente',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'codice',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'nome',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Nome',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'nome',
                'class'    => 'form-control'
            ]
        ]);

    }

}
