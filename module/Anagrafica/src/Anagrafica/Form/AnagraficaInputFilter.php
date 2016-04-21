<?php

namespace Anagrafica\Form;

use Zend\InputFilter\InputFilter;

class AnagraficaInputFilter extends InputFilter
{

    public function __construct()
    {

        $this->add([
            'name' => 'codice',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);

        $this->add([
            'name' => 'nome',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);



    }

}
