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
    data() {
      return {
        results: [],
        interval: null
      }
    },
    methods: {
      syncResults() {
        var self = this;
        axios.get('result/chart').then(function(response) {
          self.results = response.data
        })
      }
    },
    mounted() {
      this.syncResults()
      this.interval = setInterval(this.syncResults, 10000);
    },
    beforeDestroy() {
      clearInterval(this.interval)
    },
    components: {
      PieChart
    }
  }
</script>