<?php
namespace Prodotti\Service;

use Prodotti\Entity\Prodotto;

class ProdottiService {

    private $entityManager;
    private $prodottiRepository;
    private $categorieRepository;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->prodottiRepository = $entityManager->getRepository('Prodotti\Entity\Prodotto');
        $this->categorieRepository = $entityManager->getRepository('Prodotti\Entity\Categoria');
    }

    public function getProdottiInEvidenza() {
        return $this->prodottiRepository->findAll();
    }

    public function getProdotto($codice) {
        return $this->prodottiRepository->findOneByCodice($codice);
    }

    public function getListaProdotti() {
        return $this->prodottiRepository->findAll();
    }

    public function getListaCategorie() {
        return $this->categorieRepository->findAll();
    }

    public function getArrayCategorie() {
        $categorie = [];
        foreach($this->getListaCategorie() as $categoria) {
            $categorie[$categoria->getId()] = $categoria->getNome();
        }

        return $categorie;
    }

    public function creaNuovoProdotto(array $dati) {
        $prodotto = new Prodotto(
            $dati['codice'],
            $dati['nome'],
            $dati['descrizione'],
            $dati['ingredienti'],
            $dati['prezzo'],
            $this->entityManager->getReference('\Prodotti\Entity\Categoria', $dati['categoria'])
        );

        $this->entityManager->persist($prodotto);
        $this->entityManager->flush();

        return $prodotto;
    }

    public function aggiornaProdotto(Prodotto $prodotto, array $dati) {
        $prodotto->setCodice($dati['codice']);
        $prodotto->setNome($dati['nome']);
        $prodotto->setDescrizione($dati['descrizione']);
        $prodotto->setIngredienti($dati['ingredienti']);
        $prodotto->setPrezzo($dati['prezzo']);
        $prodotto->setCategoria($this->entityManager->getReference('\Prodotti\Entity\Categoria', $dati['categoria']));

        $this->entityManager->persist($prodotto);
        $this->entityManager->flush();
    }

    public function elimina(Prodotto $prodotto) {
        $this->entityManager->remove($prodotto);
        $this->entityManager->flush();
    }

}
