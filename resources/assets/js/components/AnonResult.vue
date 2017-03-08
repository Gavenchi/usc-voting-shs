<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-center flex-wrap">
          <div v-for="result in results" class="p-2">
            <pie-chart :chart-data="result.chartData" :options="result.options"></pie-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import PieChart from './PieChart.vue'
  export default {
    data: {
      interval: null
    },
    computed: {
      results: function() {
        return this.$store.state.anonResults
      }
    },
    mounted() {
      this.$store.dispatch('syncAnonResults')
      this.interval = setInterval(function () {
          this.$store.dispatch('syncAnonResults')
        }.bind(this), 10000);
    },
    beforeDestroy() {
      clearInterval(this.interval)
    },
    components: {
      PieChart
    }
  }
</script>