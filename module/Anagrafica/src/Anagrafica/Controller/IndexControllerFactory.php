<?php
namespace Anagrafica\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $AnagraficaService = $serviceLocator->getServiceLocator()->get('Anagrafica\Service\AnagraficaService');

        return new IndexController($AnagraficaService);

    }


}
