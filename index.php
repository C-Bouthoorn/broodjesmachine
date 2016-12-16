<?php require 'php-templates/dependencies.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Broodjesmachine</title>

    <?= dependencies() ?>
  </head>
  <body>
    <?php require 'php-templates/navigation.php'; ?>

    <div class="container">
      <h1>Welkom bij dé online broodjeswinkel Zikwel</h1>

      <div class="row">
        <div class="introduction col-md-4">
          <h4>Wie zijn wij?</h4>
          <p>
            Wij maken sinds 2016 persoonlijk (h)eerlijke biologische organische broodjes met vegetarisch beleg en
            beleg van scharrelvee.
          </p>

          <!--
            <p>
              Via het menu <strong>Plaats order</strong> kunt u uw eigen broodje samenstellen
              en na betaling plaatsen wij dit broodje in de wachtrij, die u kunt vinden in het
              <strong>Bestaande orders</strong> menu.<br>
              In dit menu kunt u zien met welke orders we bezig zijn en wat de status daarvan is.
              Wees gerust, wij hebben respect voor uw privacy, dus we zullen nooit uw naam vermelden.
              In plaats daarvan, krijgt u na betaling het nummer van de bestelling. Dit nummer kunt
              u dan terugvinden in de tabel.
            </p>
          -->

          <a href="/broodjesmachine/plaatsorder.php" class="btn btn-lg btn-success">Bestel nu gelijk!</a>
        </div>

        <div class="col-md-8">
          <img class="img-responsive img-rounded" alt="'Onze' winkel"
            src="https://upload.wikimedia.org/wikipedia/commons/d/d0/Acme_Bread_Shop_Front_2010.JPG">
        </div>
    </div>
  </body>
</html>
