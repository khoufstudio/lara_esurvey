<template>
	<div>
	  <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-white header-elements-inline">
          <h5 class="card-title"><i class="icon-graph"></i> Survey Statistik</h5>
          <div class="header-elements">
            <form action="#">
              <select id="select_survey" class="form-control wmin-200" @change="getSurvey" v-model="selectedSurvey">
                <option value="0" disabled>Pilih Survey</option>
                <option :value="ls.id" v-for="ls in listSurvey">{{ls.nama}}</option>
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card-deck col-md-12" id="container_filter" v-if="filterSeen">
  	 	<div :class="{'col-md-6': true, 'mt-3': (index > 1)}" v-for="(ss, index) in surveyStat">
        <div class="card">
          <div class="card-header bg-white header-elements-inline">
            <h5 class="card-title">{{ss.pertanyaan}}</h5>
          </div>
          <div class="card-body">
            <div class="col-md-12">
            	<!-- <div v-if="ss.tipe_pertanyaan == 'checkbox'"> -->
            	<div v-if="ss.tipe_pertanyaan == 'checkbox' || ss.tipe_pertanyaan == 'radiogroup'">
              	<BarComponent :label="ss.jumlah"></BarComponent>
            	</div>
            	<div v-else>
            		<h5>Tipe pertanyaan ini belum bisa divisualisasikan</h5>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	import BarComponent  from "./BarComponent.vue";

	export default {

	  name: 'Statistik',
	  components: {
	  	BarComponent
	  },
	  data () {
	    return {
	    	listSurvey: null,
	    	selectedSurvey: '0',
	    	filterSeen: false,
	    	surveyStat: null,
	    	// label: ['test', 'test2', 'test3']
	    }
	  }, 
	  methods: {
	  	getListSurvey: function() {
	  		axios.get("/api/survey")
	  			.then((res) => {
	  				if (res.data.success == true) {
	  					console.log(res.data.data)
	  					this.listSurvey = res.data.data
	  				}
	  			})
	  	},
	  	getSurvey: function() {
	  		axios.get("/api/surveystat/" + this.selectedSurvey)
	  			.then((res) => {
	  				// console.log(res.data)
	  				if (res.data.response == true) {
	  					console.log(res.data.data)
	  					this.surveyStat = res.data.data
	  				}
	  			})
	  			.catch((err) => {
	  				console.log(err)
	  			})
	  			.finally(() => {
	  				this.filterSeen = true
	  			})
	  	}
	  }, 
	  mounted: function() {
	  	this.getListSurvey()
	  }
	}
</script>

<style lang="css" scoped>
</style>