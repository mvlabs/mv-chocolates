<?php



include 'libs/db.php';
include 'vendor/autoload.php';

use MvLabs\Chocosite\Model\Magazzino;


$prodottiMagazzino = inizializzaMagazzino();
//print_r($prodottiMagazzino);

$magazzino = new Magazzino($prodottiMagazzino);


?>
<!DOCTYPE html>
<html>
  <head>
    <title>MV chocosite - Magazzino</title>
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
          <h1>Disponibilità dei prodotti a magazzino</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          var_dump($magazzino);
          $prodottiMagazzino = $magazzino->getProdottiMagazzino();
          if (count($prodottiMagazzino) > 0) { ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Prodotto</th>
                <th>Disponibilità</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($prodottiMagazzino as $prodottoMagazzino) {
              ?>
              <tr>
                <th scope="row">1</th>
                <td><?= $prodottoMagazzino->codice?></td>
                <td><?= $prodottoMagazzino->disponibilita?></td>
              </tr>
              <?php }
              ?>
              </tbody>
          </table>
          <?php } else { ?>
            Nessun prodotto presente nel magazzino
          <?php } ?>
        </div>
      </div>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
