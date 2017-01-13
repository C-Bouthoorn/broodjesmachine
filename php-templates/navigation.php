<?php
  function navigation() {
    require 'api/ingredients.php';
    global $ALL_BROODJES, $ALL_BELEG;
    
    ?>
    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <div class="navbar-header">

          <!-- Mobile navigation button -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="fa fa-bars bg-primary"></span>
          </button>

          <a class="navbar-brand" href="#">Zikwel</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/broodjesmachine/index.php">Home</a></li>
            <li><a href="/broodjesmachine/plaatsorder.php">Plaats order</a></li>
            <li><a href="/broodjesmachine/zieorders.php">Bestaande orders</a></li>

            <!-- Broodjes -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Broodjes <span class="fa fa-caret-down"></span>
              </a>

              <ul class="dropdown-menu">
                <?php foreach ( $ALL_BROODJES as $broodje_name => $broodje_data ) { ?>
                  <li><a href="#"><?= $broodje_name ?></a></li>
                <?php } ?>
              </ul>
            </li>

            <!-- Beleg -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Beleg <span class="fa fa-caret-down"></span>
              </a>

              <ul class="dropdown-menu">
                <?php foreach ( $ALL_BELEG as $beleg_name => $beleg_data ) { ?>
                  <li><a href="#"><?= $beleg_name ?><?= ($beleg_data['is_vega'] ? '<i class="fa fa-leaf"></i>' : '') ?></a></li>
                <?php } ?>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  <?php }
