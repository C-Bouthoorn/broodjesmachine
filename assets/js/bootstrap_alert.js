'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */
/*globals applyVariablesToTemplate:true */


var ALERT_TEMPLATE =
  '<div id="bsalertnr{{id}}" class="alert alert-dismissible alert-{{type}}" role="alert">' +
    '<button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>' +
    '<b>{{message}}</b>' +
    ' <span>{{subtext}}</span>' +
  '</div>';


function createBootstrapAlert(parent, options) {
  // Get defaults
  var type = options.type || 'info';
  var message = options.message || '';
  var subtext = options.subtext || '';
  var timeout = options.timeout || -1;

  // Create new ID by using the time
  var id = new Date().getTime();

  // Create new element from template with given data
  var bsalert = $( applyVariablesToTemplate(ALERT_TEMPLATE, {
    id: id, type: type, message: message, subtext: subtext
  }));

  // Function to remove alert
  function removeAlert() {
    $('#bsalertnr' + id).fadeOut(300, function() {
      $(this).remove();
    });
  }

  // Set timeout if one is desired
  if ( timeout >= 0 ) {
    setTimeout(removeAlert, timeout);
  }

  parent.prepend(bsalert);
}
