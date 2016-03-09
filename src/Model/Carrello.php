<?php
namespace MvLabs\Chocosite\Model;

// clausola use per recuperare la classe Prodotto nel namespace corretto
use MvLabs\Chocosite\Entity\Prodotto;

class Carrello {
    private $righeCarrello = [];

    public function aggiungiRigaCarrello(Prodotto $prodotto, $quantita) {
        // aggiungere prodotto alla proprietà prodotti con la relativa quantità
        $rigaCarrello = [
            'prodotto' => $prodotto,
            'quantita' => $quantita
        ];

        $this->righeCarrello[] = $rigaCarrello;
    }

    public function getRigheCarrello()
    {
        return $this->righeCarrello;
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
