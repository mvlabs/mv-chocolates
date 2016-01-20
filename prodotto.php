<?php

include 'inizializza.php';

// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

inizializza();

print_r($arrayProdotti);
$prodotto = null;
foreach($arrayProdotti as $prodottoArray) {
  if ($prodottoArray['codice'] == $codiceProdotto) {
    $prodotto = $prodottoArray;
  }
}

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
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MV chocosite</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="/index.html">Home <span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="/prodotti.html">Prodotti</a></li>
              <li><a href="/dove-siamo.html">La filosofia</a></li>
              <li><a href="/chi-siamo.html">Chi siamo</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/contatti.html">Contatti</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="row">
        <div class="col-md-12">
          <h1><?=$prodotto['nome']?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="<?=$prodotto['url_immagine']?>">
        </div>
        <div class="col-md-6">
          <h2><?=$prodotto['nome']?></h2>
          <h3><?=$prodotto['descrizione']?></h3>
          <div>
            <strong>Ingredienti</strong>: <?=$prodotto['ingredienti']?>
          </div>
          <div>
            <strong>Conservazione</strong>: <?=$prodotto['conservazione']?>
          </div>
          <div>
            <strong>Scadenza</strong>: <?=$prodotto['scadenza']?>
          </div>
          <div>
            <strong>Dimensioni</strong>: <?=$prodotto['dimensioni']?>
          </div>
          <div>
            <strong>Peso netto</strong>: <?=$prodotto['peso_netto']?>
          </div>
          <div>
            <strong>Prezzo</strong>: <?=$prodotto['prezzo']?>
          </div>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul class="list-unstyled">
              <li>
                <a href="/chi-siamo.html">Chi siamo</a>
              </li>
              <li>
                <a href="/dove-siamo.html">Dove siamo</a>
              </li>
              <li>
                <a href="/filosofia.html">La filosofia</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled">
              <li>
                <a href="/contatti.html">Contatti</a>
              </li>
              <li>
                <a href="/spedizioni.html">Spedizioni</a>
              </li>
              <li>
                <a href="/regolamento.html">Regolamento</a>
              </li>
              </a>
            </ul>
          </div>
          <div class="col-md-4">
            <address>
              <strong>Choco company, Inc.</strong><br>
              Viale delle bontà, 123<br>
              Pordenone, Italy<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
