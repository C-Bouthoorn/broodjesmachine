'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */
/*globals createBootstrapAlert:true, formatPrice: true */


function recalculatePrice() {
  var $form = $('#orderform');

  var broodje = getSelectedBroodje($form);
  var belegArray = getSelectedBeleg($form);

  console.log();

  var broodje_price = ( (window.ALL_BROODJES || {})[broodje] || { price: NaN } ).price;

  var beleg_price = (function() {
    var sum = 0;
    belegArray.map(function(beleg) {
      sum += ((window.ALL_BELEG || {})[beleg] || { price: NaN }).price;
    });
    return sum;
  })();

  var total_price = broodje_price + beleg_price;

  if ( isNaN(total_price) ) {
    createBootstrapAlert($form, {
      type: 'warning',
      message: "Something went wrong with preparing your meal, please try again.",
      subtext: "Total price is undefined",
      timeout: 5000
    });
  }

  $form.find('#price').html('€' + formatPrice(total_price));
}

function getSelectedBroodje($form) {
  var $broodje = $form.find('.broodje > :selected');
  return $broodje.val();
}

function getSelectedBeleg($form) {
  var belegArray = [];

  $form.find('.beleg > :selected').each(function(i, beleg) {
    var $beleg = $(beleg);
    belegArray.push( $beleg.val() );
  });

  return belegArray;
}

function API_handler($form, data) {
  if ( data.success ) {
    createBootstrapAlert($form, {
      type: 'success',
      message: "Order succesfully placed!",
      timeout: 1000
    });
  }

  else {
    createBootstrapAlert($form, {
      type: 'danger',
      message: "Order failed!",
      subtext: data.error.msg,
      timeout: -1
    });
  }
}

function formSubmitHandler(event) {
  // Prevent normal submit
  event.preventDefault();

  // Get form
  var $form = $(event.target);

  // Get selected broodje and beleg
  var broodje = getSelectedBroodje($form);
  var belegArray = getSelectedBeleg($form);

  // Send API call
  $.post('/broodjesmachine/api/plaatsorder.php', { broodje: broodje, beleg: belegArray }, function(data) {
    API_handler($form, data);
  });
}

function onload() {
  $('#orderform').on('submit', formSubmitHandler);
}

$(document).ready(onload);
