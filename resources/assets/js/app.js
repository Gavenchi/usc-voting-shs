require('./bootstrap')

window.axios = require('axios')
window.Chart = require('chart.js')
window.Vue = require('vue')
window.Vuex = require('vuex')

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
};

Vue.component('results', require('./components/VoteResult.vue'))
Vue.component('anon-results', require('./components/AnonResult.vue'))
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    results: Object,
    anonResults: Object
  },
  mutations: {
    updateResults(state, results) {
      state.results = results
    },
    updateAnonResults(state, results) {
      state.anonResults = results
    }
  },
  actions: {
    syncResults(context) {
      axios.post('result/chart', {
          secret: 'c2hzZWxlY3Rpb25zMjAxNw=='
      }).then(function(response) {
        context.commit('updateResults', response.data)
      })
    },
    syncAnonResults(context) {
      axios.post('result/anonchart').then(function(response) {
        context.commit('updateAnonResults', response.data)
      })
    }
  }
})

var app = new Vue({
  store: store,
  el: '#results',
})