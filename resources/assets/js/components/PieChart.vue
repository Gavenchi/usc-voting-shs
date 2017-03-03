<script>
  import { Pie, mixins } from 'vue-chartjs'
  export default Pie.extend({
    mixins: [mixins.reactiveData],
    props: ['chartData', 'options'],
    mounted () {
      this.options.title.fontSize = 16
      this.renderChart(this.chartData, this.options);
    }
  })
</script>