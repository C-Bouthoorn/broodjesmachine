'use strict'; //jshint ignore:line

function applyVariablesToTemplate(template, vars) {
  return template.replace(/{{(.+?)}}/g, function(_, varname){
    return vars[varname];
  });
}
