<?php
  require 'ingredients.php';
  require '../php-helpers/library.php';
  global $ALL_BROODJES, $ALL_BELEG, $SUCCESS;


  // Check if `broodje` is a valid broodje
  function checkBroodje($broodje) {
    global $ALL_BROODJES;

    return in_array($broodje, array_keys($ALL_BROODJES));
  }

  // Check if `beleg` is valid beleg
  function checkBelegArray($belegArray) {
    global $ALL_BELEG;

    return all_of_array_in_array($belegArray, array_keys($ALL_BELEG));
  }

  // Make sure JSON headers are sent
  send_JSON_headers();


  // Get data from POST
  $klant = $_POST['klant'];
  $broodje = $_POST['broodje'];
  $belegArray = $_POST['beleg'];

  // Check user data
  if ( ! checkBroodje($broodje) ) {
    die(create_error("Invalid broodje. '" . $broodje . "'"));
  }

  if ( ! checkBelegArray($belegArray) ) {
    die(create_error("Invalid beleg. '" . $belegArray . "'"));
  }


  // Add order to database
  $statement = $conn->prepare('INSERT INTO Bestellingen (klant, broodje, beleg) VALUES (:klant, :broodje, :beleg);');
  $statement->execute([ ':klant' => $klant, ':broodje' => $broodje, ':beleg' => $belegArray ]);

  // Return success
  die($SUCCESS);
