<template>
	<div id="app">
		<div class="loader-container" v-if="loading">
			<div class="loader">Loading...</div>
		</div>
		<div id="list-survey-container">
			<h3>List Survey:</h3>
			<ul v-if="!loading">
				<li class="list-survey" v-for="ls in listSurvey">
					<a :href="'/survey/' + ls.id">{{ ls.nama }}</a>
				</li>
			</ul>

			<div class="survey-contact mt-5">
				Please contact Administrator ( siti.maimunah96@gmail.com ) for further assistance.
			</div>
		</div>

	</div>
</template>

<script>
	export default {
		data: function() {
			return {
				listSurvey: "",
				loading: true,
			}
		},
		methods: {
			getApi: function() {
				axios.get("api/survey")
					.then(({data}) => {
						this.listSurvey = data.data
					})
					.catch(error => {
						console.log(error)
					})
					.finally(() => this.loading = false)
			}
		},
		mounted: function() {
			this.getApi()
		}
	}
</script>

<style>
	#app {
		position: relative;
	}

	#list-survey-container {
    max-width: 960px;
    margin: 0px auto;
    padding-top: 30px;
	}

	.list-survey {
    background-color: #56aefa;
    margin-bottom: 20px;
    position: relative;
    list-style-type:none;
	}

	.list-survey a {
		color: #FFF;
    font-size: 20px;
    display: inline-block;
    width: 100%;
    padding: 25px 20px;
    text-transform: capitalize;
	}

	.list-survey a:hover {
		text-decoration: none;
	}

	.loader-container {
		position: absolute;
		/*background-color: blue;*/
		width: 100vw;
		height: 100vh;
		top:0;
		left: 0;
		z-index: 10;
	}

	/* Loader */
	.loader {
	  color: #EF6565;
	  font-size: 20px;
	  margin: 100px auto;
	  width: 1em;
	  height: 1em;
	  border-radius: 50%;
	  position: relative;
	  text-indent: -9999em;
	  -webkit-animation: load4 1.3s infinite linear;
	  animation: load4 1.3s infinite linear;
	  -webkit-transform: translateZ(0);
	  -ms-transform: translateZ(0);
	  transform: translateZ(0);
	}
	@-webkit-keyframes load4 {
	  0%,
	  100% {
	    box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
	  }
	  12.5% {
	    box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
	  }
	  25% {
	    box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
	  }
	  37.5% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
	  }
	  50% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
	  }
	  62.5% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
	  }
	  75% {
	    box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
	  }
	  87.5% {
	    box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
	  }
	}
	@keyframes load4 {
	  0%,
	  100% {
	    box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
	  }
	  12.5% {
	    box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
	  }
	  25% {
	    box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
	  }
	  37.5% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
	  }
	  50% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
	  }
	  62.5% {
	    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
	  }
	  75% {
	    box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
	  }
	  87.5% {
	    box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
	  }
	}	
</style>