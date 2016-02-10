<?php

function aggiungiProdottoCarrello($prodotto, $quantita) {
  // costruzione array che rappresenta riga carrello
  $nuovaRigaCarrello = [
    'prodotto' => $prodotto,
    'quantita' => $quantita
  ];

  // inizializzazione carrello
  if (isset($_SESSION['carrello'])) {
    $carrello = $_SESSION['carrello'];

  } else {
    $carrello = [];
  }

  // verifica che lo stesso prodotto non sia già presente nel carrello
  // in caso affermativo, aggiorna la quantità

  $nuovoCarrello = [];
  $rigaAggiornata = false;
  foreach($carrello as $rigaCarrello) {
      if ($rigaCarrello['prodotto']['codice'] == $prodotto['codice']) {
          $rigaCarrello['quantita']++;
          $rigaAggiornata = true;
      }
      $nuovoCarrello[] = $rigaCarrello;
  }

  if (!$rigaAggiornata) {
      $nuovoCarrello[] = $nuovaRigaCarrello;
  }

  $carrello = $nuovoCarrello;

  // aggiornamento sessione
  $_SESSION['carrello'] = $carrello;
}

function rimuoviProdottoCarrello($codiceProdotto) {
    if (isset($_SESSION['carrello'])) {
      $carrello = $_SESSION['carrello'];

      $nuovoCarrello = [];
      foreach($carrello as $rigaCarrello) {
          if ($rigaCarrello['prodotto']['codice'] != $codiceProdotto) {
              $nuovoCarrello[] = $rigaCarrello;
          }
      }

      $_SESSION['carrello'] = $nuovoCarrello;

    }
}

function getProdottiCarrello() {
  if (isset($_SESSION['carrello'])) {
    return $_SESSION['carrello'];
  } else {
    return [];
  }
}

function getTotaliCarrello() {
  $prodottiCarrello = getProdottiCarrello();

  $totale = 0;
  $quantita = 0;

  foreach($prodottiCarrello as $rigaCarrello) {
    $totale += $rigaCarrello['prodotto']['prezzo'] * $rigaCarrello['quantita'];
    $quantita += $rigaCarrello['quantita'];
  }

  return [
    'totale' => $totale,
    'pezzi' => $quantita
  ];

}
