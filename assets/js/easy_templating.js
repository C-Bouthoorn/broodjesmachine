'use strict'; //jshint ignore:line
/*jshint browser:true, devel:true, jquery:true */


function applyVariablesToTemplate(template, vars) {
  return template.replace(/{{(.+?)}}/g, function(_, varname){
    return vars[varname];
  });
}
