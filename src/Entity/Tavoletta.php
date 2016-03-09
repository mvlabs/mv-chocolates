<?php

namespace MvLabs\Chocosite\Entity;

// Tavoletta implementa l'interfaccia Prodotto, che viene usata nel carrello
class Tavoletta implements Prodotto
{
    private $codice;

    private $nome;

    private $descrizione;

    private $ingredienti;

    private $conservazione;

    private $scadenza;

    private $dimensioni;

    private $pesoNetto;

    private $prezzo;

    private $urlImmagine;

    public function codice()
    {
        return $this->codice;
    }

    public function nome()
    {
        return $this->nome;
    }

    public function descrizione()
    {
        return $this->descrizione;
    }

    public function ingredienti()
    {
        return $this->ingredienti;
    }

    public function conservazione()
    {
        return $this->conservazione;
    }

    public function scadenza()
    {
        return $this->scadenza;
    }

    public function dimensioni()
    {
        return $this->dimensioni;
    }

    public function pesoNetto()
    {
        return $this->pesoNetto;
    }

    public function prezzo()
    {
        return $this->prezzo;
    }

    public function urlImmagine()
    {
        return $this->urlImmagine;
    }

    public function __set($name, $value)
    {
        if ($name === 'peso_netto') {
            $this->pesoNetto = $value;
        } else if ($name === 'url_immagine') {
            $this->urlImmagine = $value;
        }
    }
}
