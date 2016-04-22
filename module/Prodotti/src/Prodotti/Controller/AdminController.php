<?php

namespace Prodotti\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Prodotti\Service\ProdottiService;
use Prodotti\Form\ProdottoForm;

class AdminController extends AbstractActionController
{
    private $prodottiService;
    private $form;

    public function __construct(ProdottiService $prodottiService, ProdottoForm $prodottoForm) {
        $this->prodottiService = $prodottiService;
        $this->form = $prodottoForm;
    }

    public function indexAction()
    {
        return new ViewModel([
            'lista' => $this->prodottiService->getListaProdotti()
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

                $prodotto = $this->prodottiService->creaNuovoProdotto($postData);

                // salvataggio del file nella posizione finale
                if (!empty($postData['immagine'])) {
                    move_uploaded_file($postData['immagine']['tmp_name'], __DIR__ . '/../../../../../public/prodotti/' . $prodotto->getCodice() . '.jpg');
                }

                $this->redirect()->toRoute('zfcadmin/prodotti');

            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
    }

    public function eliminaAction()
    {
        $prodotto = $this->prodottiService->getProdotto($this->params()->fromRoute('codice'));
        $this->prodottiService->elimina($prodotto);

        $this->redirect()->toRoute('zfcadmin/prodotti');
    }

    public function modificaAction()
    {
        $prodotto = $this->prodottiService->getProdotto($this->params()->fromRoute('codice'));
        var_dump($prodotto);
        $arrayProdotto=$this->prodottiService->getArrayProdotti($prodotto);
        var_dump($arrayProdotto);
        //$form = new ProdottoForm($prodotto);
        //return new ViewModel(['form' => $this->form]);
    }

}
