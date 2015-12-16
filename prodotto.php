<?php
// dati prodotto
$nome = "GUANA - cioccolato fondente";
$descrizione = "Tavoletta di cioccolato fondente extra al 74%";
$ingredienti = "pasta di cacao, zucchero di canna, burro di cacao, vaniglia. Cacao min. 74%. Può contenere tracce di nocciole, mandorle, pistacchi, noci, latte.";
$conservazione = "conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.";
$scadenza = "14 mesi";
$dimensioni = "9 x 15,5 x 1,2 cm";
$peso_netto = "50";
$prezzo = "5,00";
$url_immagine = "https://c1.staticflickr.com/3/2369/2458986998_c81485c2db_z.jpg?zz=1";

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
          <h1><?=$nome?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="<?=$url_immagine?>">
        </div>
        <div class="col-md-6">
          <h2><?=$nome?></h2>
          <h3><?=$descrizione?></h3>
          <div>
            <strong>Ingredienti</strong>: <?=$ingredienti?>
          </div>
          <div>
            <strong>Conservazione</strong>: <?=$conservazione?>
          </div>
          <div>
            <strong>Scadenza</strong>: <?=$scadenza?>
          </div>
          <div>
            <strong>Dimensioni</strong>: <?=$dimensioni?>
          </div>
          <div>
            <strong>Peso netto</strong>: <?=$peso_netto?>
          </div>
          <div>
            <strong>Prezzo</strong>: <?=$prezzo?>
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
