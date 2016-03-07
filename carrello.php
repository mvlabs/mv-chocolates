<?php

// usiamo il namespace corretto per la classe ArchivioCarrelli
use MvLabs\Chocosite\Model\ArchivioCarrelli;

// inizializziamo le sessioni
session_start();

// includere i file con le classi gestiti da Composer
include 'vendor/autoload.php';

// creo un'istanza dell'archivio carrelli
$archivioCarrelli = new ArchivioCarrelli();

// recupero il carrello corrente
$carrello = $archivioCarrelli->recupera();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MV chocosite</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'include/header.php'; ?>
    <main>
      <div class="row">
        <div class="col-md-12">
          <h1>Carrello acquisti</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          $righeCarrello = $carrello->getRigheCarrello();
          if (count($righeCarrello) > 0) { ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Prodotto</th>
                <th>Quantità</th>
                <th>Prezzo unitario</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($righeCarrello as $rigaCarrello) {
              ?>
              <tr>
                <th scope="row">1</th>
                <td><?= $rigaCarrello['prodotto']->nome() ?></td>
                <td><?= $rigaCarrello['quantita']?></td>
                <td><?= $rigaCarrello['prodotto']->prezzo() ?> &euro;</td>
                <td><a href="" class="btn btn-link">rimuovi</a></td>
              </tr>
              <?php }
              $totaliCarrello = $carrello->getTotali();
              ?>
              <tr class="success" style="font-weight: bold">
                <th scope="row"></th>
                <td>Totale</td>
                <td><?=$totaliCarrello['pezzi']?></td>
                <td><?=$totaliCarrello['totale']?> &euro;</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <?php } else { ?>
            Nessun prodotto presente nel carrello
          <?php } ?>
        </div>
      </div>
      <?php if (count($righeCarrello) > 0) { ?>
      <div class="row">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
          <a href="iscrizione.php" class="btn btn-success btn-lg">Procedi con l'acquisto</a>
        </div>
      </div>
      <?php } ?>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
