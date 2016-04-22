<?php

namespace Prodotti\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProdottoFormFactory implements FactoryInterface
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
        $prodottiService = $serviceLocator->get('Prodotti\Service\ProdottiService');
        $listaCategorie = $prodottiService->getArrayCategorie();

        $inputFilter = new ProdottoInputFilter();//rimanda ai filter
        $form = new ProdottoForm($listaCategorie);//carica in un array la lista delle categorie nella combo

        $form->setInputFilter($inputFilter);//applica i filter alla form

        return $form;
    }
}
