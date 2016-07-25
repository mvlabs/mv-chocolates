<?php

namespace Prodotti\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Prodotti\Service\ProdottiService;

class ApiController extends AbstractRestfulController
{
    private $prodottiService;

    public function __construct(ProdottiService $prodottiService) {
        $this->prodottiService = $prodottiService;
    }

    /**
     * Return list of resources
     *
     * @return mixed
     */
    public function getList()
    {
        $listaProdotti = $this->prodottiService->getListaProdotti();

        $risultato = [];
        foreach($listaProdotti as $prodotto) {
            $risultato[] = $prodotto->toArray();
        }

        return new JsonModel($risultato);
    }

    /**
     * Return single resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return new JsonModel($this->prodottiService->getProdotto($id)->toArray());
    }

    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return mixed
     */
    public function create($data)
    {
        //TODO: Implement Method
    }

    /**
     * Update an existing resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update($id, $data)
    {
        //TODO: Implement Method
    }

    /**
     * Delete an existing resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        //TODO: Implement Method
    }
}
