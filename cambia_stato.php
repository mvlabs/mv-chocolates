<?php
use MvLabs\Chocosite\Model\CambiaStato

include 'vendor/autoload.php';

include 'libs/db.php';

$cambioStato = new cambioStato();

// recupero il carrello corrente
$cambia = $cambioStato->switch();

// rimando a pagina carrello
header ('location: ordini.php');
