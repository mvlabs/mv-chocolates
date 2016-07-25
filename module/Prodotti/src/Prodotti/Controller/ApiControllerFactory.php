<?php
namespace Prodotti\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ApiControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $prodottiService = $serviceLocator->getServiceLocator()->get('Prodotti\Service\ProdottiService');

        return new ApiController($prodottiService);

    }


}
