<?php

  return false;
  
  $path = $_SERVER['REQUEST_URI'];


  function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
      return true;
    }

    return (substr($haystack, -$length) === $needle);
  }


  if ( ! file_exists("../XAMPP/WWW" . $path) ) {

    if ( endsWith($path, 'json') ) {
      // Send content-type and an empty array when asking for json
      header('Content-Type: application/json');
      echo '[]';
    }

    else {
      // Send 404 when asking for a normal page
      http_response_code(404);
      echo '<h1>Page not found!</h1>';
    }

    return true;
  }

  return false;
