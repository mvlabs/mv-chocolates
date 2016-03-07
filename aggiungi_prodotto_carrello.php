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
$archivioCarrelli = new ArchivioCarrelli();
$carrello = $archivioCarrelli->recupera();

// aggiungere prodotto al carrello
$carrello->aggiungiRigaCarrello($prodotto, 1);

// salvare il carrello in sessione
$archivioCarrelli->salva($carrello);

// rimando a pagina carrello
header ('location: carrello.php');
