<?php
// usiamo il namespace corretto per la classe ArchivioCarrelli
use MvLabs\Chocosite\Model\ArchivioCarrelli;
use MvLabs\Chocosite\Model\Giacenze;
use MvLabs\Chocosite\Model\Segno;
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
$movimenta= new Giacenze();
//Definisco se si tratta di un carico o scarico del magazzino
$Segno=New Segno('-');
setGiacenza($movimenta->movimenta($prodotti),$Segno);
salvaOrdine($prodotti, $utente);
//rimando a pagina carrello
header ('location: grazie.php');
