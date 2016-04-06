<?php
namespace Prodotti\Service;

class ProdottiService {

    private $entityManager;
    private $prodottiRepository;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->prodottiRepository = $entityManager->getRepository('Prodotti\Entity\Prodotto');
    }

    public function getProdottiInEvidenza() {
        return $this->prodottiRepository->findAll();
    }

    public function getProdotto($codice) {
        return $this->prodottiRepository->findOneByCodice($codice);
    }

    public function getListaProdotti() {
        return $this->prodottiRepository->getListaProdotti();
    }

}
