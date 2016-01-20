<?php

function inizializza() {

// lettura file esterno
$listaProdotti = file_get_contents('data/prodotti.json');

// conversione in array
$arrayProdotti = json_decode($listaProdotti, true);
}

?>
