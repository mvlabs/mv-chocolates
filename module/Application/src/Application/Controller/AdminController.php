<?php

namespace Anagrafica\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Anagrafica\Service\AnagraficaService;
use Anagrafica\Form\AnagraficaForm;

class AdminController extends AbstractActionController
{
    private $AnagraficaService;
    private $form;

    public function __construct(AnagraficaService $AnagraficaService, AnagraficaForm $AnagraficaForm) {
        $this->AnagraficaService = $AnagraficaService;
        $this->form = $AnagraficaForm;
    }

    public function indexAction()
    {
        return new ViewModel([
            'lista' => $this->AnagraficaService->getListaAnagrafica()
        ]);
    }

    public function nuovoAction()
    {
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();

            // merge dati che arrivano dalla form
            $postData = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $this->form->setData($postData);

            if ($this->form->isValid()) {

                $Anagrafica = $this->AnagraficaService->creaNuovoAnagrafica($postData);

                // salvataggio del file nella posizione finale
                if (!empty($postData['immagine'])) {
                    move_uploaded_file($postData['immagine']['tmp_name'], __DIR__ . '/../../../../../public/Anagrafica/' . $Anagrafica->getCodice() . '.jpg');
                }

                $this->redirect()->toRoute('zfcadmin/Anagrafica');

            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
    }

    public function eliminaAction()
    {
        $Anagrafica = $this->AnagraficaService->getAnagrafica($this->params()->fromRoute('codice'));
        $this->AnagraficaService->elimina($Anagrafica);

        $this->redirect()->toRoute('zfcadmin/Anagrafica');
    }

}
