<?php
  require 'ingredients.php';
  global $ALL_BROODJES, $ALL_BELEG;


  function errorAndDie($error_message) {
    die(json_encode([ 'success' => false, 'error' => [ 'msg' => $error_message ]]));
  }


  function all_of_array_in_array($array0, $array1) {
    foreach($array0 as $k) {
      if ( ! in_array($k, $array1) ) {
        return false;
      }
    }
    return true;
  }


  function checkBroodje($broodje) {
    global $ALL_BROODJES;

    return in_array($broodje, array_keys($ALL_BROODJES));
  }

  function checkBeleg($beleg) {
    global $ALL_BELEG;

    $belegArray = explode(';', $beleg);

    return all_of_array_in_array($belegArray, $ALL_BELEG);
  }

  // Make sure JSON headers are sent
  header('Content-Type: application/json');

  // Get data from POST
  $broodje = $_POST['broodje'];
  $beleg = $_POST['beleg'];

  // Check if broodje is correct
  if ( ! checkBroodje($broodje) ) {
    errorAndDie("Invalid broodje. '" . $broodje . "'");
  }

  // Check beleg
  if ( ! checkBeleg($beleg) ) {
    errorAndDie("Invalid beleg. '" . $beleg . "'");
  }

  // TODO Add order to database

  // Return success
  die(json_encode([ 'success' => true ]));
