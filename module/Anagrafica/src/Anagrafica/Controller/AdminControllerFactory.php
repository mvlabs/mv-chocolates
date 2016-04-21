<?php
namespace Anagrafica\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $AnagraficaService = $serviceLocator->getServiceLocator()->get('Anagrafica\Service\AnagraficaService');
        $AnagraficaForm = $serviceLocator->getServiceLocator()->get('Anagrafica\Form\AnagraficaForm');

        return new AdminController($AnagraficaService, $AnagraficaForm);

    }


}
