<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;

class Giacenze {
     private $codice;
     private $descrizione;
     private $qta;
     private $movimento;


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
        $this->movimento= $prodotto;
        return $this->movimento;
    }

}
