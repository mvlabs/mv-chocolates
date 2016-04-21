<?php

namespace Anagrafica\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AnagraficaFormFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return DriverLicenseForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $AnagraficaService = $serviceLocator->get('Anagrafica\Service\AnagraficaService');

        $inputFilter = new AnagraficaInputFilter();
        $form = new AnagraficaForm();

        $form->setInputFilter($inputFilter);

        return $form;
    }
}
