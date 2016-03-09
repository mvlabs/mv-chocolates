<?php
include 'libs/db.php';
include 'vendor/autoload.php';
use MvLabs\Chocosite\Entity\Giacenze;
//recupero dal db le giacenze che vengono vengono rese disponibili da PDO e recuperate nel costruttore della classe Giacenze
$listaGiacenze = inizializzaGiacenze();
//istanzio la clase Giacenze il cui metodo __constructor recupera il recorset dal db
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
          <h1>Riepiologo giacenze in magazzino del  <?php echo date('d/m/Y \a\l\l\e H:i:s')?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Prodotto</th>
                <th>Disponibilità</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($listaGiacenze as $giacenza){ //PER OGNI PRODOTTO VENGONO STAMPATE LE GIACENZE
              ?>
              <tr>
                <th scope="row">1</th>
                <td><?= $giacenza->codice()?></td>
                <?php if ((($giacenza->qta())<1) or is_null($giacenza->qta())){//VENGONO EVIDENZIATE LE GIACENZE A 0 O ANOMALE?>
                  <td>ESAURITO</td>
                  <?php }
                   else {?>
                  <td><?= $giacenza->qta()?></td>
                  <?php }?>
                <?php }?>
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
