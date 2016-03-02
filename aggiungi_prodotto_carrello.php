<?php
// inizializziamo le sessioni
session_start();

include 'libs/db.php';

// includere i file con le classi gestiti da Composer
include 'vendor/autoload.php';

// usiamo il namespace corretto per la classe ArchivioCarrelli
use MvLabs\Chocosite\Model\ArchivioCarrelli;

// recuperiamo il prodotto da aggiungere al carrello
// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

$prodotto = recuperaProdottoDaCodice($codiceProdotto);

//aggiungiProdottoCarrello($prodotto, 1);

// istanziare una classe carrello
// avrò un'istanza di ArchivioCarrelli per ogni utente
// l'istanza sarà attiva per la durata della sessione dell'utente
// non tengo memoria di tutti i carrelli
$archivioCarrelli = new ArchivioCarrelli();
$carrello = $archivioCarrelli->recupera();

// aggiungere prodotto al carrello
$carrello->aggiungiRigaCarrello($prodotto, 1);

// salvare il carrello in sessione
$archivioCarrelli->salva($carrello);

// rimando a pagina carrello
// redirect a carrello.php
header ('location: carrello.php');
