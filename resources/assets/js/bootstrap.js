window.$ = window.jQuery = require('jquery')
window.Tether = require('tether')

require('bootstrap')
require('./bootstrap-autohidingnavbar')

$(".fixed-top").autoHidingNavbar()