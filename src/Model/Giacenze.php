<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;

class Giacenze {
    private $giacenze = [];
    private $movimento = [];

    public function __construct($riepilogoGiacenze = null) {
        $this->giacenze = $riepilogoGiacenze;
    }

    public function movimenta(array $prodotto) {
        // aggiungere prodotto alla proprietà movimento con la relativa quantità
        $this->movimento=$prodotto;
        return $this->movimento;
    }

    //recupera le giacenze dei prodotti richiesti
    public function getGiacenza()
    {
        return $this->giacenze;
    }

}
