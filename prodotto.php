<?php
include 'libs/db.php';

// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

$prodotto = recuperaProdottoDaCodice($codiceProdotto);

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
          <h1><?= $prodotto->nome() ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="<?= $prodotto->urlImmagine() ?>">
        </div>
        <div class="col-md-6">
          <h2><?= $prodotto->nome() ?></h2>
          <h3><?= $prodotto->descrizione() ?></h3>
          <div>
            <strong>Ingredienti</strong>: <?= $prodotto->ingredienti() ?>
          </div>
          <div>
            <strong>Conservazione</strong>: <?= $prodotto->conservazione() ?>
          </div>
          <div>
            <strong>Scadenza</strong>: <?= $prodotto->scadenza() ?>
          </div>
          <div>
            <strong>Dimensioni</strong>: <?= $prodotto->dimensioni() ?>
          </div>
          <div>
            <strong>Peso netto</strong>: <?= $prodotto->pesoNetto() ?>
          </div>
          <div>
            <strong>Prezzo</strong>: <?= $prodotto->prezzo() ?>
          </div>
          <br>
          <div>
            <a href="aggiungi_prodotto_carrello.php?codice=<?= $prodotto->codice() ?>" class="btn btn-success">Acquista</a>
          </div>
        </div>
      </div>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
