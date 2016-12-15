<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Broodjesmachine</title>

    <?php require 'php-templates/dependencies.php'; ?>
    <?php require 'php-helpers/price_formatting.php'; ?>
    <?php require 'api/ingredients.php'; ?>

    <?= dependencies() ?>
    <?= ingredientsScript() ?>

    <script src="/broodjesmachine/assets/js/bootstrap_alert.js"></script>
    <script src="/broodjesmachine/assets/js/easy_templating.js"></script>
    <script src="/broodjesmachine/assets/js/format_price.js"></script>
    <script src="/broodjesmachine/assets/js/plaatsorder.js"></script>
  </head>
  <body>
    <?php require 'php-templates/navigation.php'; ?>

    <div class="container">
      <h1>Plaats hier uw order</h1>

      <form id="orderform" action="#" method="GET">
        <div class="form-group">
          <select class="broodje selectpicker" title="Broodje"
            data-live-search="true" data-show-subtext="true"
            onchange="recalculatePrice()">

            <?php foreach ( $ALL_BROODJES as $broodje_name => $broodje_data ) { ?>

              <option
                value="<?= $broodje_name ?>"
                data-subtext="€<?= format_price( $broodje_data['price'] ) ?>"
                ><?=
                  $broodje_name
                ?></option>

            <?php } ?>

          </select>
        </div>


        <div class="form-group">
          <select class="beleg selectpicker" title="Beleg"
            data-live-search="true" data-show-subtext="true" multiple
            onchange="recalculatePrice()">

            <?php foreach ( $ALL_BELEG as $beleg_name => $beleg_data ) { ?>

              <option
                value="<?= $beleg_name ?>"
                data-subtext="€<?= format_price( $beleg_data['price'] ) ?>"
                ><?=
                  $beleg_name
                ?></option>

            <?php } ?>

          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add order for <strong id="price">€0</strong></button>
      </form>
    </div>
  </body>
</html>
