'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */


function formatPrice(price) {
  var formattedprice = Math.round(price * 100) / 100;

  if ( formattedprice % 1 === 0 ) {
    // 0 decimals
    return formattedprice + '';
  }

  else if ( formattedprice * 10 % 1 === 0 ) {
    // 1 decimal
    return formattedprice + '0';
  }

  else if ( formattedprice * 100 % 1 === 0 ) {
    // 2 decimals
    return formattedprice + '';
  }

  else {
    // more than 2 decimals, so round to 2
    return formattedprice.toFixed(2);
  }
}
