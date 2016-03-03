<?php
include 'libs/db.php';
include 'vendor/autoload.php';
use MvLabs\Chocosite\Model\Giacenze;

$listaGiacenze = inizializzaGiacenze();
//print_r($prodottiMagazzino);
$giacenza = new Giacenze($listaGiacenze);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MV chocosite - Giacenze</title>
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
          <h1>Riepiologo giacenze in magazzino al</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          var_dump($listaGiacenze);
          $prodottiMagazzino = $giacenza->getGiacenza();?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Prodotto</th>
                <th>Disponibilità</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($prodottiMagazzino as $prodottoMagazzino) {
              ?>
              <tr>
                <th scope="row">1</th>
                <td><?= $prodottoMagazzino->codice?></td>
                <td><?= $prodottoMagazzino->qta?></td>
                <td><?php if (1<2){?>
                <td><?= $prodottoMagazzino->qta?></td></td>
              </tr>
              <?php }
              ?>
              </tbody>
          </table>
        </div>
      </div>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
