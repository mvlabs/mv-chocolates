<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;

class Magazzino {
    private $giacenze = [];
    private $movimenta = [];


    public function __construct($giacenze = null, $codice = null) {
        $this->giacenze= $giacenze;
    }
    public function movimenta(Prodotto $prodotto) {
        // aggiungere prodotto alla proprietà prodotti con la relativa quantità
        $this->movimenta=$prodotto;
    }

    public function getGiacenza(Prodotto $prodotto)
    {
        return $this->giacenze;
    }

    public function getTotali()
    {
        $totale = 0;
        $quantita = 0;

        foreach ($this->righeCarrello as $rigaCarrello) {
            $totale += $rigaCarrello['prodotto']->prezzo() * $rigaCarrello['quantita'];
            $quantita += $rigaCarrello['quantita'];
        }

        return [
            'totale' => $totale,
            'pezzi' => $quantita
        ];
    }
}
