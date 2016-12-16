'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */
/*globals createBootstrapAlert:true, formatPrice: true */


function add(a, b) { return a + b; }


// The reason to have so much safety in these two functions is because:
// - window.ALL_* could be undefined, and undefined[*] gives an error
// - window.ALL_*[*] could be undefined and undefined[price] gives an error
function getBroodjePriceSafe(broodje) {
  return (
    (  window.ALL_BROODJES || {}  )[broodje] || { price: NaN }
  ).price;
}

function getBelegPriceSafe(beleg) {
  return (
    (  window.ALL_BELEG || {}  )[beleg] || { price: NaN }
  ).price;
}


function recalculatePrice() {
  // Calculate the total price of the order
  var $form = $('#orderform');

  var broodje = getSelectedBroodje($form);
  var belegArray = getSelectedBeleg($form);

  var broodjePrice = getBroodjePriceSafe(broodje);
  var belegPrice = belegArray.map(getBelegPriceSafe).reduce(add, 0) || NaN;

  var totalPrice = broodjePrice + belegPrice;

  if ( isNaN(totalPrice) ) {
    createBootstrapAlert($form, {
      type: 'warning',
      message: "Something went wrong with preparing your meal, please try again.",
      subtext: "Total price is undefined",
      timeout: 5000
    });
  }

  // Set price to form price field
  $form.find('#price').html('€' + formatPrice(totalPrice));
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
