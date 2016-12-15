<?php
  // Will be transfered to database

  $ALL_BROODJES = [
    "Ciabatta" => [
      'price' => 1.00
    ],

    "Pistolette" => [
      'price' => 1.20
    ],

    "Kaiser" => [
      'price' => 1.25
    ],

    "Stokbrood" => [
      'price' => 1.30
    ],

    "Meergranen" => [
      'price' => 1.40
    ],

    "Organisch" => [
      'price' => 2.00
    ]
  ];

  $ALL_BELEG = [
    "Ham" => [
      'price' => 1.00
    ],

    "Salami" => [
      'price' => 1.001
    ],

    "Kipfilet" => [
      'price' => 1.008
    ],

    "Leverworst" => [
      'price' => 1.01
    ],

    "Kaas" => [
      'price' => 1.10
    ],

    "Ei" => [
      'price' => 1.11
    ],

    "Salade" => [
      'price' => 1.111
    ],

    "Tomaat" => [
      'price' => 1.117
    ],

    "Pesto" => [
      'price' => 1.00
    ]
  ];

  // Convert PHP array to JSON and insert into window
  function ingredientsScript() {
    global $ALL_BROODJES, $ALL_BELEG;

    ?><script>
      //jshint ignore:start
      window.ALL_BROODJES = <?= json_encode($ALL_BROODJES); ?>;
      window.ALL_BELEG = <?= json_encode($ALL_BELEG); ?>;
      //jshint ignore:end
    </script><?php
  }
