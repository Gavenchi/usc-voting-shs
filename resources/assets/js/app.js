require('./bootstrap')

window.axios = require('axios')
window.Chart = require('chart.js')
window.Vue = require('vue')

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
};

Vue.component('results', require('./components/VoteResult.vue'))

var app = new Vue({
  el: '#results',
})