<?php

  return false;

  // Ignore further code

  // Check if $haystacks ends with $needle
  function str_ends_with($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
      return true;
    }

    return (substr($haystack, -$length) === $needle);
  }


  // HACK?: __FILE__ is the current page in absolute path on the server
  if ( file_exists(__FILE__) ) {
    // Let server handle this
    return false;
  }

  // Get the current file name as relative to the web root
  // e.g.   http://localhost/my/random/page.php?num=4    -->    /my/random/page.php
  $filename = $_SERVER["PHP_SELF"];

  // If asking for a JSON document, 404 should be an empty array with correct headers
  if ( str_ends_with($filename, '.json') ) {
    header('Content-Type: application/json');
    echo '[]';
  }

  // When not asking for JSON, just send a default HTML 404 message
  else {
    http_response_code(404);
    echo '<h1>Page not found!</h1>';
  }

  return true;
