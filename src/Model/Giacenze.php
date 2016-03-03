<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto

class Giacenze {
    private $giacenze = [];
    private $scarico = [];
    private $carico = [];

    public function __construct($riepilogoGiacenze = null) {
        $this->giacenze = $riepilogoGiacenze;
    }

    public function scarico(array $prodotto) {
        // aggiungere prodotto alla proprietà prodotti con la relativa quantità
        $this->scarico=$prodotto;
    }

    public function carico(array $prodotto) {
        // aggiungere prodotto alla proprietà prodotti con la relativa quantità
        $this->carico=$prodotto;
    }
    //recupera le giacenze dei prodotti richiesti
    public function getGiacenza()
    {
        return $this->giacenze;
    }

}
