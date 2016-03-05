<?php

// usiamo il namespace corretto per la classe ArchivioCarrelli
use MvLabs\Chocosite\Model\ArchivioCarrelli;
use MvLabs\Chocosite\Model\Giacenze;

// inizializziamo le sessioni
session_start();

// includere i file con le classi gestiti da Composer
include 'vendor/autoload.php';

include 'libs/db.php';

// creo un'istanza dell'archivio carrelli
$archivioCarrelli = new ArchivioCarrelli();

// recupero il carrello corrente
$carrello = $archivioCarrelli->recupera();

// recuperiamo i dati di carrello e utente e li salviamo in un file json
$prodotti = $carrello->getRigheCarrello();

$utente = $_SESSION['utente'];


//istanzio la classe Giacenze

$movimenta= new Giacenze($prodotti);
//salvo  l'array del carrello nella proprietà movimenti attraverso il metodo pubblico Giacenze->movimenta
$scarico=$movimenta->movimenta($prodotti);
//salvo i dati nel database nella tabella giacenze
setGiacenza($scarico,0);
//salvaOrdine($prodotti, $utente);
// rimando a pagina carrello
//header ('location: grazie.php');
