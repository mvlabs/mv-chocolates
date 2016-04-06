<?php
namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $prodottiService = $serviceLocator->getServiceLocator()->get('Prodotti\Service\ProdottiService');

        return new IndexController($prodottiService);

    }


}
