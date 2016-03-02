<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;

class Magazzino {
    private $prodottiMagazzino = [];

    public function __construct($prodottiMagazzino = null) {
        $this->prodottiMagazzino = $prodottiMagazzino;
    }

    public function getProdottiMagazzino()
    {
        return $this->prodottiMagazzino;
    }

    public function getDisponibilita($codice)
    {
        foreach($prodottiMagazzino as $prodottoMagazzino) {
            if ($prodottoMagazzino->id == $codice) {
                return $prodottoMagazzino->disponibilita;
            }
        }
        return 0;
    }

    public function aggiornaDisponibilita($codice,)
}
