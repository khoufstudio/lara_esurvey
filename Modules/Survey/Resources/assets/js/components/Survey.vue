<template>
	<div class="content">
		<form id="msform" action="#">
			<div v-if="!loading">
				<fieldset>
					<div class="col-md-8 mt-5" style="margin: 0 auto;" v-if="urutan == -1">
						<div class="widget text-center border-box p-cb">
							<h3 class="survey-title">{{ listSurvey.nama }}</h3>
							<p class="mt-4">{{ listSurvey.deskripsi }}</p>
							<!-- <button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button> -->
							<router-link to="/" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</router-link>
							<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
						</div>
					</div>
				</fieldset>

				<fieldset v-for="(lq, index) in listQuestion">
					<div class="col-md-8 mt-5" style="margin: 0 auto;" v-if="index == urutan">
						<div class="widget text-center border-box p-cb">
							<h4 class="survey-title widget-title text-left">{{ lq.pertanyaan }}</h4>							
							<div v-if="lq.tipe_pertanyaan == 'radiogroup'">
								<label class="p-radio p-radio radio-color-secondary text-left" v-for="ans in lq.answer">
									<span class="ml-3">{{ ans.jawaban }}</span>
									<input type="radio" name="radio_size">
									<span class="p-radio-style"></span>
								</label>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button @click="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>

							<div v-else-if="lq.tipe_pertanyaan == 'checkbox'">
								<label class="p-checkbox p-checkbox checkbox-color-secondary text-left" v-for="ans in lq.answer">
									<span class="ml-3">{{ ans.jawaban }}</span>
									<input type="checkbox" name="checkbox_size">
									<span class="p-checkbox-style"></span>
								</label>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button @click="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>
							
							<div v-else>
								<div class="form-group">
									<input type="text" class="form-control" id="inputtext">
								</div>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button @click="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</fieldset>

			</div>
		</form>
	</div>
</template>

<script>
export default {
	props: ['id'],

  name: 'Survey',

  data: function() {
			return {
				listSurvey: null,
				listQuestion: null,
				loading: true,
				urutan: -1,
			}
		},
		methods: {
			getApi: function() {
				// axios.get("/api/survey/1")
				axios.get("/api/survey/" + this.id)
					.then(({data}) => {
						this.listSurvey = data.data
						this.listQuestion = data.question_answer
						console.log(data.question_answer)
						console.log(data.data)
					})
					.catch(error => {
						console.log(error)
					})
					.finally(() => this.loading = false)
			},
			next: function() {
				this.urutan++
			},
			previous: function() {
				if (this.urutan > -1) {
					this.urutan--
				}
			},
			submit: function() {
				alert('submit coy')
			}
		},
		mounted: function() {
			// console.log(this.id)
			this.getApi()
		}
}
</script>

<style lang="css" scoped>
	.survey-title {
		text-transform: capitalize;
	}

	/*Hide all except first fieldset*/
	/*#msform fieldset:not(:first-of-type) {
	    display: none;
	}*/
</style>		