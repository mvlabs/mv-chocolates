<?php
include 'libs/db.php';
include 'vendor/autoload.php';
use MvLabs\Chocosite\Model\Giacenze;

$listaGiacenze = inizializzaGiacenze();
//print_r($prodottiMagazzino);
$giacenza = new Giacenze($listaGiacenze);
$listaProdotti=$giacenza->getGiacenza();
var_dump($listaProdotti);
?>
