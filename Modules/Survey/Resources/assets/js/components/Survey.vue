<template>
	<div class="content">
		<form id="msform" action="#">
			<!-- <div v-if="!loading && listQuestion.length > 0"> -->
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
									<input type="radio" name="pertanyaanradio" :value="ans.urutan" v-model="checkedRadio">
									<span class="p-radio-style"></span>
								</label>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button @click="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Selesai</button>
									</span>
								</div>
							</div>

							<div v-else-if="lq.tipe_pertanyaan == 'checkbox'">
								<label class="p-checkbox p-checkbox checkbox-color-secondary text-left" v-for="ans in lq.answer">
									<span class="ml-3">{{ ans.jawaban }}</span>
									<input type="checkbox" name="pertanyaancheckbox" :value="ans.urutan-1" v-model="checkedCheckbox">
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
				checkedCheckbox: [],
				checkedRadio: '',
				backTo: ''
			}
		},
		methods: {
			getApi: function() {
				// axios.get("/api/survey/1")
				axios.get("/api/survey/" + this.id)
					// .then((data) => {
					.then(({data}) => {
						this.listSurvey = data.data
						this.listQuestion = data.question_answer
						// console.log(data.question_answer)
						// console.log(data.data)
					})
					.catch(error => {
						console.log(error)
					})
					.finally(() => this.loading = false)
			},
			next: function() {
				var question = (this.urutan > -1) ? this.listQuestion[this.urutan] : "kosong";
				console.log("urutan" + this.urutan)
				// console.log(question.tipe_pertanyaan)

				if (question != "kosong") {
					var tipePertanyaan = this.listQuestion[this.urutan].tipe_pertanyaan;
					// var tipePertanyaan = this.listQuestion[this.urutan+1].tipe_pertanyaan;
					console.log(tipePertanyaan)
					var condition = question.condition;

					if (typeof condition !== undefined && condition.length)  {
						var jawabanRadio = parseInt(this.checkedRadio)-1;
						for (var i = 0; i < condition.length; i++) {
							var loncatKe = condition[i].jump;
							if (tipePertanyaan == "radiogroup") {
								var jawabanKondisi = condition[i].answer;

								if (jawabanRadio == jawabanKondisi) {
									console.log("loncat ke soal " + loncatKe)

									if (loncatKe == 'e') {
										this.submit()
									} else if (loncatKe == 's') {
										this.backTo = this.urutan
										this.urutan++
									} else {
										this.backTo = this.urutan
										this.urutan = loncatKe-1
									}

									return
								}
							} else if (tipePertanyaan == "checkbox") {
								var jawabanCheckbox = this.checkedCheckbox;
								var jawabanKondisi = condition[i].answer.split(",");

								for (var x = 0; x < jawabanKondisi.length; x++) {
									jawabanKondisi[x] = parseInt(jawabanKondisi[x])
								}

								console.log(jawabanCheckbox)
								console.log("jawaban checkbox " + jawabanCheckbox.join(","))
								console.log(jawabanKondisi)
								console.log("jawaban kondisi " + jawabanKondisi.join(","))
								console.log(typeof jawabanCheckbox)
								console.log(typeof jawabanKondisi)

								// console.log(jawabanCheckbox.join(",") == jawabanKondisi.join(","))

								// if (jawabanCheckbox.equals(jawabanKondisi)) {
								if (jawabanCheckbox.join(",") == jawabanKondisi.join(",")) {
									console.log("loncat ke soal " + loncatKe)

									if (loncatKe == 'e') {
										this.submit()
									} else if (loncatKe == 's') {
										this.backTo = this.urutan
										this.urutan++
									} else {
										this.backTo = this.urutan
										this.urutan = loncatKe-1
									}

									return
								}

							}
						}
						// }
						// console.log('ada kondisi')
					}
				} else {
					// this.urutan++
				}




				// console.log(question);
				// console.log(condition);

				// if (question === undefined || question.length == 0) {
					// console.log(this.listQuestion[0].condition)
					// console.log(this.listQuestion[this.urutan+1].condition)
				// }
				// 

				this.urutan++
				this.backTo = this.urutan-1 
			},
			previous: function() {
				if (this.urutan > -1) {
					this.urutan = this.backTo
				}
			},
			submit: function() {
				alert('Fungsi simpan belum berjalan')
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
</style>		