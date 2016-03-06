<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;
use MvLabs\Chocosite\Entity\Segno;

class Giacenze {
     private $codice;
     private $descrizione;
     private $qta;
     private $daMovimentare;


    //recupera le giacenze dei prodotti richiesti
    public function qta()
    {
        return $this->qta;
    }

    public function descrizione()
    {
        return $this->descrizione;
    }

    public function codice()
    {
        return $this->codice;
    }

    public function movimenta($prodotto)
    {
        $this->daMovimentare= (object)$prodotto;
        return $this->daMovimentare;
    }

}
