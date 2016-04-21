<?php
namespace Anagrafica\Service;

use Anagrafica\Entity\Anagrafica;

class AnagraficaService {

    private $entityManager;
    private $AnagraficaRepository;
    private $categorieRepository;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->AnagraficaRepository = $entityManager->getRepository('Anagrafica\Entity\Anagrafica');
      }

    public function getAnagraficaInEvidenza() {
        return $this->AnagraficaRepository->findAll();
    }

    public function getAnagrafica($codice) {
        return $this->AnagraficaRepository->findOneByCodice($codice);
    }

    public function getListaAnagrafica() {
        return $this->AnagraficaRepository->findAll();
    }



    public function creaNuovoAnagrafica(array $dati) {
        $Anagrafica = new Anagrafica(
            $dati['codice'],
            $dati['nome']);

        $this->entityManager->persist($Anagrafica);
        $this->entityManager->flush();

        return $Anagrafica;
    }

    public function elimina(Anagrafica $Anagrafica) {
        $this->entityManager->remove($Anagrafica);
        $this->entityManager->flush();
    }

}
