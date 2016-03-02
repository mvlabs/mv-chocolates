<?php
// inizializziamo le sessioni

session_start();

include 'libs/db.php';
include 'libs/carrello.php';
include 'vendor/autoload.php';
use MvLabs\Chocosite\Model\Carrello;

// recuperiamo il prodotto da aggiungere al carrello
// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

$prodotto = recuperaProdottoDaCodice($codiceProdotto);

// adesso vogliamo usare la classe Carrello.phpinfo
// devo instanziare la classe carrello
// poi aggiungo il prodotto al carrello
// Prodotto: classe astratta o interfaccia?
// a noi interessa che prodotto sia qualcosa a cui possiamo chiedere un prezzo
// per questo scegliamo l'interfaccia, con un solo metodo: prezzo();
// discrimante nella scelta: se serve solo descrivere un comportamento senza
// definire l'implementazione allora si opta per l'interfaccia
$carrello = new Carrello();
$carrello->aggiungiRigaCarrello($prodotto, 1);

// come viene salvato il carrello??
// Dobbiamo salvarlo in sessione
$_SESSION['carrello'] = $carrello;
// rimando a pagina carrello
header ('location: carrello.php');
