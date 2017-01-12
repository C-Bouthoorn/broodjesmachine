<?php
  // Default success message
  $SUCCESS = json_encode([ 'success' => true ]);

  // Create error message in JSON format
  // (usually used with die())
  function create_error($error_message) {
    return json_encode([ 'success' => false, 'error' => [ 'msg' => $error_message ]]);
  }

  // Check if `$array1` contains all items from `$array0`
  function all_of_array_in_array($array0, $array1) {
    foreach($array0 as $k) {
      if ( ! in_array($k, $array1) ) {
        return false;
      }
    }

    return true;
  }

  // Send the headers needed for JSON
  function send_JSON_headers() {
    header('Content-Type: application/json');
  }
