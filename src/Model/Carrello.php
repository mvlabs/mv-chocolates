<?php

namespace MvLabs\Chocosite\Model;

// devo tenere in conto i parametri di sessione?
//


class Carrello {

    // private $utente;
    private $righeCarrello;

    // public function __construct(Collezione $collezione) {
    //     $this->righeCarrello = $collezione;
    // }

    public function aggiungiRigaCarrello($prodotto, $quantita)
    {
        // dobbiamo aggiungere Prodotto alla proprietà prodotti con la relativa
        // quantità.

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
        $totali = 0;
        foreach($this->righeCarrello as $rigaCarrello) {
            $totali += $rigaCarrello['quantita'] * $rigaCarrello['prodotto']->prezzo();
        }
        return $totali;
    }

    // class ArrayPHP implements Collection {
    //     $array = [];
    //
    //     public function retrieveAll() {
    //         return $this->array;
    //     }
    //
    //     public function add($element) {
    //         $this->array[] = $element;
    //     }
}
