<template>
  <div class="small">
    <bar-chart :chart-data="datacollection" :options="options"></bar-chart>
  </div>
</template>

<script>
  import BarChart from './chart/BarChart.js'

  export default {
    components: {
      BarChart
    },
    props: ['label'],
    data () {
      return {
        datacollection: null,
        labelJumlah: [],
        labelJawaban: []
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
      	// this.label.forEach((item, index) => {
      	// 	console.log(item)
      	// }) 
      	// 
      	// 
      	// console.log(this.label)
      	// this.label.forEach((item, index) => {
      	// 	console.log(item)
      	// })
      	// 
      	// console.log(this.label);
     
      	this.label.forEach((el) => {
      		this.labelJawaban.push(el.jawaban)
      		this.labelJumlah.push(el.jumlah)
      	})
      	// console.log(Object.keys(this.label));

        this.datacollection = {
          // labels: this.label,
          // labels: [this.getRandomInt(), this.getRandomInt()],
          labels: this.labelJawaban,
          datasets: [{
          	label: 'Jumlah Jawaban',
          	data: this.labelJumlah,
        	  backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        }

        this.options = {
      	 	legend: {
			        display: false
			    },
    	    scales: {
		        yAxes: [{
	            display: true,
	            ticks: {
                suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                // OR //
                beginAtZero: true   // minimum value will be 0.
	            }
		        }]
		    	}
        }
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    /*margin:  150px auto;*/
  }
</style>