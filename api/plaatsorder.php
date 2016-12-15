<?php
  require 'ingredients.php';
  global $ALL_BROODJES, $ALL_BELEG;


  // Die with error message in JSON
  function errorAndDie($error_message) {
    die(json_encode([ 'success' => false, 'error' => [ 'msg' => $error_message ]]));
  }

  // Check if `array1` contains all items from `array0`
  function all_of_array_in_array($array0, $array1) {
    foreach($array0 as $k) {
      if ( ! in_array($k, $array1) ) {
        return false;
      }
    }

    return true;
  }


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
  header('Content-Type: application/json');


  // Get data from POST
  $broodje = $_POST['broodje'];
  $belegArray = $_POST['beleg'];

  // Check user data
  if ( ! checkBroodje($broodje) ) {
    errorAndDie("Invalid broodje. '" . $broodje . "'");
  }

  if ( ! checkBelegArray($belegArray) ) {
    errorAndDie("Invalid beleg. '" . $belegArray . "'");
  }


  // TODO Add order to database

  // Return success
  die(json_encode([ 'success' => true ]));
