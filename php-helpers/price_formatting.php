<?php
  // Float modulus with 1
  //   Practically checks if there is anything after the decimal point
  function fmod1($a) {
    return fmod($a, 1);
  }


  function format_price($price) {
    // 0 decimals
    if ( fmod1($price) == 0 ) {
      return $price . "";
    }

    // 1 decimal
    else if ( fmod1($price*10) == 0 ) {
      return $price . "0";
    }

    // 2 decimals
    else if ( fmod1($price*100) == 0 ) {
      return $price . "";
    }

    // More than 2 decimals
    else {
      return round($price, 2) . "";
    }
  }
