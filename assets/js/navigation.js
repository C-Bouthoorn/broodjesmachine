'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */


$(document).ready(function() {
  var current_path = location.pathname;

  if ( location.pathname == '/broodjesmachine' || location.pathname == '/broodjesmachine/' ) {
    current_path = '/broodjesmachine/index.php';
  }


  $('#navbar > .nav > li').each(function(i, elem) {
    var $elem = $(elem);
    var href = $elem.find('> a').attr('href');

    if ( href == current_path ) {
      $elem.addClass('active');
    }
  });
});
