<?php

namespace Anagrafica\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Anagrafica\Service\AnagraficaService;

class IndexController extends AbstractActionController
{
    private $AnagraficaService;

    public function __construct(AnagraficaService $AnagraficaService) {
        $this->AnagraficaService = $AnagraficaService;
    }

    public function indexAction()
    {
        return new ViewModel([
            'lista' => $this->AnagraficaService->getListaAnagrafica()
        ]);
    }

    public function AnagraficaAction()
    {
        $Anagrafica = $this->AnagraficaService->getAnagrafica($this->params()->fromRoute('codice'));
        return new ViewModel([
            'Anagrafica' => $Anagrafica
        ]);
    }
}
