<?php
  // TODO: Transfer to database(?)

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
      'price' => 1.00,
      'is_vega' => false
    ],

    "Salami" => [
      'price' => 1.001,
      'is_vega' => false
    ],

    "Kipfilet" => [
      'price' => 1.008,
      'is_vega' => false
    ],

    "Leverworst" => [
      'price' => 1.01,
      'is_vega' => false
    ],

    // Vega:

    "Kaas" => [
      'price' => 1.10,
      'is_vega' => true
    ],

    "Ei" => [
      'price' => 1.11,
      'is_vega' => true
    ],

    "Salade" => [
      'price' => 1.11,
      'is_vega' => true
    ],

    "Tomaat" => [
      'price' => 1.117,
      'is_vega' => true
    ],

    "Pesto" => [
      'price' => 1.00,
      'is_vega' => true
    ]
  ];

  // Convert PHP array to JSON array and insert into `window`
  function ingredientsScript() {
    global $ALL_BROODJES, $ALL_BELEG;

    ?><script>
      //jshint ignore:start
      window.ALL_BROODJES = <?= json_encode($ALL_BROODJES); ?>;
      window.ALL_BELEG = <?= json_encode($ALL_BELEG); ?>;
      //jshint ignore:end
    </script><?php
  }
