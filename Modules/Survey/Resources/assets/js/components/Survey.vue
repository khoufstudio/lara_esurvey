<template>
	<div class="content">
		<!-- <form id="msform" action="#" method="post"> -->
		<form id="msform" action="#" @submit="submit($event)" method="post">
			<div v-if="!loading">
				<fieldset>
					<div class="col-md-8 mt-5" style="margin: 0 auto;" v-if="urutan == -1">
						<div class="widget text-center border-box p-cb">
							<h3 class="survey-title">{{ listSurvey.nama }}</h3>
							<p class="mt-4">{{ listSurvey.deskripsi }}</p>
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
									<input type="radio" name="pertanyaanradio" :value="ans.urutan-1" v-model="checkedRadio">
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
										<button type="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>

              <div v-else-if="lq.tipe_pertanyaan == 'slider'">
								  <range-slider
                    class="slider"
                    min="0"
                    max="100"
                    step="1"
                    v-model="inputText">
                    <!-- v-model="sliderValue" -->
                  </range-slider>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button type="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>
							
							<div v-else>
								<div class="form-group">
									<input type="text" class="form-control" id="inputtext" v-model="inputText">
								</div>
								<div class="text-right">
									<button @click="previous" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali</button>
									<span v-if="index != listQuestion.length-1">
										<button @click="next" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Berikutnya</button>
									</span>
									<span v-else>
										<button type="submit" data-lightbox="inline" class="btn btn-success btn-shadow btn-rounded mt-3">Submit</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</fieldset>

				<fieldset>
					<div class="col-md-8 mt-5" style="margin: 0 auto;" v-if="urutan == -2">
					<!-- <div class="col-md-8 mt-5" style="margin: 0 auto;" v-if="urutan == -2"> -->
						<div class="widget text-center border-box p-cb">
							<i class="fa fa-4x mb-3 fa-check-circle text-success"></i>
							<h2 class="survey-title">Sukses</h2>
							<p class="mt-4">Terimakasih telah mengikuti survey</p>
							<router-link to="/" data-lightbox="inline" class="btn btn-warning btn-shadow btn-rounded mt-3">Kembali ke halaman utama</router-link>
						</div>
					</div>
				</fieldset>

			</div>
		</form>
	</div>
</template>

<script>
  import RangeSlider from 'vue-range-slider'
  // you probably need to import built-in style
  import 'vue-range-slider/dist/vue-range-slider.css'

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
          inputText: '',
          backTo: '',
          surveyId: null, // untuk submit database
          jawaban: [] // untuk submit database
        }
      },
      components: {
        RangeSlider
      },
      methods: {
        getApi: function() {
          axios.get("/api/survey/" + this.id)
            .then(({data}) => {
              this.listSurvey = data.data
              this.listQuestion = data.question_answer
              this.surveyId = data.data.id
              console.log(data.data)
              // console.log(data.data.id)
            })
            .catch(error => {
              // console.log(error)
              this.$router.push('/') 
            })
            .finally(() => this.loading = false)
        },
        next: function() {
          var question = (this.urutan > -1) ? this.listQuestion[this.urutan] : "kosong";
        
          if (question != "kosong") {
            // var soalJawaban
            // soalJawaban.urutan = this.urutan;
            var jawabanContainer 
            
            var tipePertanyaan = this.listQuestion[this.urutan].tipe_pertanyaan;
            console.log(tipePertanyaan)

            this.save()
            
            var condition = question.condition;

            if (typeof condition !== undefined && condition.length)  {
              // var jawabanRadio = parseInt(this.checkedRadio)-1;
              var jawabanRadio = parseInt(this.checkedRadio);

              for (var i = 0; i < condition.length; i++) {
                var loncatKe = condition[i].jump;
                if (tipePertanyaan == "radiogroup") {
                  var jawabanKondisi = condition[i].answer;
                  jawabanContainer = jawabanRadio
                  // soalJawaban.jawaban = jawabanRadio
                  // this.jawaban.push([this.urutan, jawabanContainer])

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

                    this.checkedCheckbox = []
          					this.checkedRadio = ''

                    return
                  }
                } else if (tipePertanyaan == "checkbox") {
                  var jawabanCheckbox = this.checkedCheckbox;
                  var jawabanKondisi = condition[i].answer.split(",");

                  for (var x = 0; x < jawabanKondisi.length; x++) {
                    jawabanKondisi[x] = parseInt(jawabanKondisi[x])
                  }

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

                    this.checkedCheckbox = []
										this.checkedRadio = ''

                    return
                  }
                } else {
                  console.log("jawaban " + jawaban) 
                }
              }
            }
            // this.jawaban.push(soalJawaban) 
          }

          // clear input
          this.checkedCheckbox = []
					this.checkedRadio = ''
					this.inputText = ''

          this.urutan++
          this.backTo = this.urutan-1 
        },
        previous: function() {
          if (this.urutan > -1) {
            // this.urutan = this.backTo

            if (this.urutan == this.backTo) {
              this.urutan--
            } else {
            	if (this.urutan == 0) {
            		this.urutan-- // urutan = -1
            	} else {
              	this.urutan = this.backTo
            	}
            }
            // this.urutan--
            this.jawaban.pop()
          }

          // clear input
          this.checkedCheckbox = []
					this.checkedRadio = ''
					this.inputText = ''
        },
        save: function() {
          var question = (this.urutan > -1) ? this.listQuestion[this.urutan] : "kosong";
        
          if (question != "kosong") {
            var jawabanContainer 
            
            var tipePertanyaan = this.listQuestion[this.urutan].tipe_pertanyaan;
            console.log(tipePertanyaan)
            
            // masukin pertanyaan
            if (tipePertanyaan == "radiogroup") {
              var jawabanRadio = parseInt(this.checkedRadio);
              var jawabanJSON = new Object()
              jawabanJSON.urutan = this.urutan
              jawabanJSON.jawaban = jawabanRadio
              this.jawaban.push(jawabanJSON)
            } else if (tipePertanyaan == "checkbox") {
              var jawabanJSON = new Object()
              var jawabanCheckbox = this.checkedCheckbox;
              jawabanJSON.urutan = this.urutan
              jawabanJSON.jawaban = jawabanCheckbox
              this.jawaban.push(jawabanJSON)
            } else if (tipePertanyaan == "text" || tipePertanyaan == "slider") {
              var jawabanJSON = new Object()
              var jawabanText = this.inputText;
              jawabanJSON.urutan = this.urutan
              jawabanJSON.jawaban = jawabanText
              this.jawaban.push(jawabanJSON)
            }
          }
        },
        submit: function(e) {
          e.preventDefault()

          // save last value
          this.save()

          var jawabanSend = JSON.stringify(this.jawaban)
          var vm = this
          
          // fungsi kirim udah jalan
          axios.post('/api/survey_result', {
            survey_id: this.surveyId,
            jawaban: jawabanSend
          })
          .then(function(response) {
            console.log(response)
            vm.urutan = -2
          })
          .catch(function(err) {
            console.log(err)
          })
        }
      },
      mounted: function() {
        this.getApi()
      }
  }
</script>

<style lang="css" scoped>
	.survey-title {
		text-transform: capitalize;
  }

  .slider {
    /* overwrite slider styles */
    width: 100%;
  }
</style>		