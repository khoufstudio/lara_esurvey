@extends('layouts.backend.master')

@section('title', 'Survey')
@section('menu', 'Survey')
@section('submenu', $condition = (isset($editpage)) ? 'Edit' : 'Tambah')
@section('submenu2', '')

@section('content')
	<style>
		#boxquestion {
			border:#263238 dashed 2px; 
			min-height:200px; 
			padding:10px;
			background-color: #FAFAFA;
		}

		#boxquestion h2 { 
			font-weight: bold;
			color: #D3D3D3;
			letter-spacing: 2px;
		}

		#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
		/* #sortable li { margin: 0 5px 5px 5px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; border:#00CC99 solid 1px; } */
		#sortable li .actx { position: absolute; cursor:pointer; width:24px; height:24px; text-align:center; color: 00CC99; font-weight:bold; }
		/* #sortable li .actx:hover { background-color:#00CC99; color:#FFFFFF;} */
		#sortable li .editx { right:65px; }
		#sortable li .closex { right:40px; }
		.json_val { display:none;}
		#soal { /*display:none;*/}
		tr.spaceUnder>td {
			padding-bottom: 1em;
		}

		.container-condition-answer {
			/*background-color: black;*/
			margin: 0px;
			width: 100%;
			/*height: 200px;*/
		}
	</style>

	<div class="col-md-12">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="card">
			<div class="card-body">
				<form action="{{ $route }}" method="POST" enctype="multipart/form-data" id="form_survey">
					@csrf
					<fieldset class="mb-3">
						<legend class="text-uppercase font-size-sm font-weight-bold">Informasi Survey</legend>

						{{-- Nama Survey --}}
						<div class="form-group row">
							<label class="col-form-label col-lg-2">Nama Survey</label>
							<div class="col-lg-10">
								<input type="text" name="nama_survey" class="form-control" value="{{ $data->nama ?? "" }}" placeholder="Nama Survey">
							</div>
						</div>

						{{-- Deskripsi --}}
						<div class="form-group row">
							<label class="col-form-label col-lg-2">Deskripsi</label>
							<div class="col-lg-10">
								<textarea rows="3" cols="3" class="form-control" placeholder="Deskripsi" name="deskripsi">{{ $data->deskripsi ?? "" }}</textarea>
							</div>
						</div>

						{{-- Status --}}
						<div class="form-group row">
							<label class="col-form-label col-lg-2">Status</label>
							<div class="col-lg-10">
								<select class="form-control form-control-uniform" data-fouc="" name="status">
									<option value="0" {{ (($data->status ?? "") == 0) ? 'selected' : '' }}>Public</option>
									<option value="1" {{ (($data->status ?? "") == 1) ? 'selected' : '' }}>Private</option>
								</select>
							</div>
						</div>

						<div class="button-add clearfix mb-2">
							<div class="btn-group float-right">
								<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><b><i class="icon-compose"></i></b> Tambah Pertanyaan</button>
								<div id="add_question" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(142px, 36px, 0px);">
									<a href="#" class="dropdown-item item-question">Text</a>
									<a href="#" class="dropdown-item item-question">Checkbox</a>
									<a href="#" class="dropdown-item item-question">Radio Button</a>
								</div>
							</div>
						</div>

						<div id="boxquestion" class="text-center">
							@if (!isset($data))
								<h2 class="text-tambah-pertanyaan mt-4">Tambah Pertanyaan</h2>
							@endif
							<ul id="sortable">
								@if (isset($data))
									@foreach ($data->question as $question)
										@if ($question->tipe_pertanyaan == "text")
											@php
											$json_val = '{
												"type": "text", 
												"name": "'.$question->pertanyaan.'", 
												"isRequired": "true", 
												"type_input": "'.$question->tipe_text.'" }'
												@endphp
												<li class="alert alert-primary border-0 alert-dismissible">
													<span class="editx actx"><i class="icon-pencil7"></i></span> &nbsp; <span class="closex actx"><i class="icon-close2"></i></span>
													<span class="json_val">{{ $json_val }}</span>
													<div class="form-group text-left"> 
														<label><span class="nox">{{ $question->urutan }}.</span>  <span class="val">{{ $question->pertanyaan }}</span></label>
														<input type="text" name="name" id="name" class="form-control" placeholder="Tipe jawaban = {{ $question->tipe_text }}" disabled>
													</div>
													<div class="choices-container"></div>
												</li>
										@else
											<li class="alert alert-primary border-0 alert-dismissible">
												<span class="editx actx"><i class="icon-pencil7"></i></span> &nbsp; <span class="closex actx"><i class="icon-close2"></i></span>
												@php
													$jawaban = [];
													foreach ($question->answer as $qa) {
														array_push($jawaban, $qa->jawaban);
													}

													$json_val = '{
														"type": "'.$question->tipe_pertanyaan.'", 
														"name": "'.$question->pertanyaan.'", 
														"isRequired": "true", 
														"visibleIf": "1 greater 0", 
														"choices": [
														"'.implode("\", \"",$jawaban).'"
													]}';
												@endphp
												<span class="json_val">{{ $json_val }}</span>
												<div class="form-group text-left">
													<label><span class="nox">{{ $question->urutan }}.</span>  <span class="val">{{ $question->pertanyaan }}</span></label>
													<div class="choices-container">
														@foreach ($question->answer as $ans)
															@if ($ans->question->tipe_pertanyaan == 'checkbox')
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="custom_checkbox_stacked_checked_disabled" checked="" disabled="">
																	<label class="custom-control-label" for="custom_checkbox_stacked_checked_disabled">{{ $ans->jawaban }}</label>
																</div>
															@else
																<div class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" id="custom_radio_stacked_checked_disabled" checked="" disabled="">
																	<label class="custom-control-label" for="custom_radio_stacked_checked_disabled">{{ $ans->jawaban }}</label>
																</div>
															@endif
														@endforeach
													</div>  
												</div>
											</li>
										@endif
									@endforeach
								@endif	
							</ul>
						</div>

						<div class="form-group mt-3">
							<button name="button_submit" type="submit" onclick="return confirm('Apakah anda yakin?')"
							class="btn bg-teal-400 mr-3" value="0">Submit <i class="icon-paperplane ml-2"></i></button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Edit Pertanyaan Text -->
	<div id="modal_edit_question_text" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h6 class="modal-title">EDIT PERTANYAAN</h6>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					@csrf
					<div class="form-group">
						<label>Pertanyaan</label>
						<input type="text" name="modal_text_pertanyaan" id="modal_text_pertanyaan" class="form-control" required="" placeholder="Silahkan isi pertanyaan">
					</div>
					<div class="form-group">
						<label class="">Tipe Input</label>
						<select name="modal_text_input_tipe" id="modal_text_input_tipe" class="form-control" placeholder="Pilih">
							<option value="" disabled="" selected="">Pilih</option>
							<option value="text">Text</option>
							<option value="number">Number</option>
							<option value="date">Date</option>
							<option value="time">Time</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn bg-info btn-action modal-text-simpan">Simpan</button>
					{{-- <button type="submit" class="btn bg-info btn-action" onclick="return confirm('Apakah anda yakin?')">Simpan</button> --}}
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edit Pertanyaan Radio dan Checkbox -->
	<div class="modal fade" id="modal_cb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		{{-- <div class="modal-dialog modal-lg"> --}}
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h6 class="modal-title">EDIT PERTANYAAN</h6>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>
				<div class="modal-body">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="nav-item">
								<a href="#generalTab" class="nav-link active show" aria-controls="generalTab" role="tab" data-toggle="tab">General</a>
							</li>
							<li role="presentation" class="nav-item">
								<a href="#choicesTab" class="nav-link" aria-controls="choicesTab" role="tab" data-toggle="tab">Choices</a>
							</li>
							<li role="presentation" class="nav-item">
								<a href="#jumpingTab" id="jump_nav" class="nav-link" aria-controls="#jumpingTab" role="tab" data-toggle="tab">Jumping</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="generalTab">
								<div class="form-group">
									<label>Pertanyaan</label>
									<input type="text" name="modal_cb_pertanyaan" id="modal_cb_pertanyaan" class="form-control" required="" placeholder="Silahkan isi pertanyaan">
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="choicesTab">
								<div id="container-choices">
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Tambah jawaban" id="textjawaban">
										<div class="input-group-append">
											<button class="btn btn-success" type="button" id="btntambahjawaban"><i class="icon-plus2"></i></button>
										</div>
									</div>
									<div id="container-answer"></div>
								</div>              
							</div>
							<div role="tabpanel" class="tab-pane" id="jumpingTab">
								{{-- <button class="btn btn-link text-slate-800 mb-2" id="add_kondisi"><i class="icon-plus-circle2"></i> Kondisi</button> --}}
								<form action="#">
									<div class="form-group">
										<div id="jawaban_for_jump">
										</div>

										<div class="form-group mt-3 row">
											<div class="input-group col-sm-12">
												<select name="kondisi_jawaban" id="kondisi_jawaban" class="form-control border-right-0" required="">
													<option value="" disabled selected>Pilih Kondisi</option>
													<option value="1">Loncat Ke</option>
													<option value="2">Hide</option>
												</select>
												<select name="loncat_ke" id="loncat_ke" class="form-control border-right-0" required="">
													<option value="1">Soal 1</option>
													<option value="2">Soal 2</option>
													<option value="3">Soal 3</option>
												</select>
												<span class="input-group-append">
													<button type="submit" class="btn btn-success" id="btn_tambah_kondisi"><i class="icon-plus2 mr-2"></i>Tambah</button>
												</span>
											</div>
										</div>

										<div class="container-condition-answer row">
								    	{{-- <table class="table">
												<thead>
													<tr class="bg-blue-300">
														<th rowspan="2">#</th>
														<th colspan="3" class="text-center">Jawaban</th>
														<th rowspan="2">Kondisi</th>
														<th rowspan="2">Soal</th>
														<th rowspan="2"></th>
													</tr>
													<tr class="bg-blue-300">
														<th>1</th>
														<th>2</th>
														<th>3</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan="7" class="text-center">Belum ada kondisi</td>
													</tr>
												</tbody>
											</table> --}}
										</div>
									</div>
								</form>

								<div class="row">
									<div class="col-sm-12">
										<div id="kondisi-container">
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn bg-info btn-action modal-cb-rb-simpan">Simpan</button>
				</div>
			</div>
		</div>
	</div>

@stop

@section('script')
	<script>
		$(document).ready(function() {
	    // $('#sortable').sortable();
	    $('#sortable').sortable({
	    	stop: function( event, ui ) { noSoal(); }
	    });
	    $('#sortable').disableSelection();
	  });

		$('.form-control-uniform-custom').uniform({
			fileButtonClass: 'action btn bg-blue',
			selectClass: 'uniform-select bg-pink-400 border-pink-400'
		})

		$('.item-question').on('click', function(e) {
			e.preventDefault(); 
			var jenisInput = $(this).text(); 

			$('.text-tambah-pertanyaan').hide();

			if (jenisInput == 'Text') {
				var json_val = '{"type": "text", "name": "Ini soal text", "isRequired": "true", "type_input": "text", "urutan":"3", "condition": "" }';
				$( "#sortable" ).append( `
					<li class="alert alert-primary border-0 alert-dismissible">
					<span class="editx actx"><i class="icon-pencil7"></i></span> &nbsp; <span class="closex actx"><i class="icon-trash"></i></span>
					<span class="json_val">${json_val}</span>
					<div class="form-group text-left">
					<label><span class="nox">1.</span>  <span class="val">Ini soal text</span></label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Tipe jawaban = text" disabled>
					</div>
					<div class="choices-container"></div>
					</li>` 
					);
			} else if (jenisInput == 'Checkbox'){
				// var json_val = '{"type": "checkbox", "name": "soal checkbox", "isRequired": "true", "visibleIf": "1 greater 0", "choices": [{"1": "pilihan1"}, {"2": "pilihan2"}, {"3": "pilihan3"}], "urutan":"1", "condition": ""}';
				var json_val = '{"type": "checkbox", "name": "soal checkbox", "isRequired": "true", "visibleIf": "1 greater 0", "choices": ["pilihan1", "pilihan2", "pilihan3"], "urutan":"1", "condition": ""}';
				$( "#sortable" ).append(
					`<li class="alert alert-primary border-0 alert-dismissible">
					<span class="editx actx"><i class="icon-pencil7"></i></span> &nbsp; <span class="closex actx"><i class="icon-trash"></i></span>
					<span class="json_val">${json_val}</span>
					<div class="form-group text-left">
					<label><span class="nox">1.</span>  <span class="val">soal checkbox</span></label>
					<div class="choices-container">
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="custom_checkbox_stacked_checked_disabled" checked="" disabled="">
					<label class="custom-control-label" for="custom_checkbox_stacked_checked_disabled">Pilihan 1</label>
					</div>
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="custom_checkbox_stacked_checked_disabled" checked="" disabled="">
					<label class="custom-control-label" for="custom_checkbox_stacked_checked_disabled">Pilihan 2</label>
					</div>
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="custom_checkbox_stacked_checked_disabled" checked="" disabled="">
					<label class="custom-control-label" for="custom_checkbox_stacked_checked_disabled">Pilihan 3</label>
					</div>
					</div>  
					</div>
					</li>` 
					);
			} else if (jenisInput == 'Radio Button'){
				// var json_val = '{"type": "radiogroup", "name": "soal radio", "visibleIf": "1 greater 0", "isRequired": "true", "choices": [{"1": "pilihan1"}, {"2": "pilihan2"}, {"3": "pilihan3"}], "urutan":"2", "condition": ""}';
				var json_val = '{"type": "radiogroup", "name": "soal radio", "visibleIf": "1 greater 0", "isRequired": "true", "choices": ["pilihan1", "pilihan2", "pilihan3" ], "urutan":"2", "condition": ""}';
				$( "#sortable" ).append(`
					<li class="alert alert-primary border-0 alert-dismissible">
					<span class="editx actx"><i class="icon-pencil7"></i></span> &nbsp; <span class="closex actx"><i class="icon-trash"></i></span>
					<span class="json_val">${json_val}</span>
					<div class="form-group text-left">
						<label><span class="nox">1.</span>  <span class="val">soal radio</span></label>
						<div class="choices-container">
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="custom_radio_stacked_checked_disabled" checked="" disabled="">
								<label class="custom-control-label" for="custom_radio_stacked_checked_disabled">Pilihan 1</label>
							</div>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="custom_radio_stacked_checked_disabled" checked="" disabled="">
							<label class="custom-control-label" for="custom_radio_stacked_checked_disabled">Pilihan 2</label>
						</div>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="custom_radio_stacked_checked_disabled" checked="" disabled="">
							<label class="custom-control-label" for="custom_radio_stacked_checked_disabled">Pilihan 3</label>
						</div>
					</div>    
					</div>
					</span>
					</li>` );
			}
			noSoal();    
		});

		$("#sortable").on("click",".editx", function(e){
			e.preventDefault();

			$('.nav-tabs a[href="#generalTab"]').tab('show');

			liParent = $(this).parent('li').index();

			judul_soal = $(this).parent().find('.json_val').html();
			soal = JSON.parse(judul_soal);

			if (soal.type == 'text') {
				$('#modal_text_pertanyaan').val(soal.name);
				$('#modal_text_input_tipe').val(soal.type_input);

				$('#modal_edit_question_text').modal('show');
			} else { 
	      // untuk checkbox dan radio button
	      $('#container-answer').empty();
	      $('#modal_cb_pertanyaan').val(soal.name);
	      var isi = '';

	      $('.container-condition-answer').empty();
	    
	      soal.choices.forEach(element => {
	      	isi += `<div class="input-group mb-3">
	      	<input type="text" class="form-control choice-cb-rb" placeholder="Tambah jawaban" value="${element}">
	      	<div class="input-group-append">
	      	<button class="btn btn-danger delete-choice" type="button"><i class="icon-minus2"></i></button>
	      	</div>
	      	</div>`;
	      });

	      $('#container-answer').append(isi);
	      $('#modal_cb').modal('show');
	    }
	  });

		$("#sortable").on("click",".closex", function(e){
			e.preventDefault();
			a = $(this).parent('li').index();
			b = $(".val")[a].innerHTML;
			if (confirm(`Apakah anda yakin untuk menghapus ${b}?`)) { 
				$(this).parent('li').remove(); 
				noSoal(); 
			}
		});

		$('#btntambahjawaban').on('click', function(e) {
			var val = $('#textjawaban').val();
			$('#textjawaban').val('');

			var isi = `<div class="input-group mb-3">
			<input type="text" class="form-control choice-cb-rb" placeholder="Tambah jawaban" value="${val}">
			<div class="input-group-append">
			<button class="btn btn-danger delete-choice" type="button"><i class="icon-minus2"></i></button>
			</div>
			</div>`;

			$('#container-answer').append(isi);
		});

		$("#container-answer").on("click",".delete-choice", function(e){
			e.preventDefault(); 
			$(this).closest('.input-group').remove();
		});

		$('.modal-text-simpan').on('click', function(e) {
			var textPertanyaan = $('#modal_text_pertanyaan').val();
			var tipeinputPertanyaan = $('#modal_text_input_tipe').val();

			soal.name = textPertanyaan;
			soal.type_input = tipeinputPertanyaan;

			var soalSave = JSON.stringify(soal);
			var placeholder = `Tipe jawaban = ${tipeinputPertanyaan}`;

			$('li .val').eq(liParent).text(textPertanyaan);
			$('li input').attr("placeholder", placeholder);

			$('#pertanyaan-container').val(soalSave);

			$('li .json_val').eq(liParent).text(soalSave);

			$('#modal_edit_question_text').modal('hide');
		});

		$('.modal-cb-rb-simpan').on('click', function(e) {
			var choices = [];

			$(".choice-cb-rb").each(function() {
				choices.push($(this).val());      
			});

			var jsonSurveLogic = "";
			$('.json-con').each(function() {
	  		jsonSurveLogic += ", " + $(this).text();
	  	})

	  	jsonSurveLogic = jsonSurveLogic.substring(2, jsonSurveLogic.length);

			var textPertanyaan = $('#modal_cb_pertanyaan').val();

			soal.name = textPertanyaan;
			soal.choices = choices;
			soal.condition = jsonSurveLogic;
			var soalSave = JSON.stringify(soal);

			$('li .json_val').eq(liParent).text(soalSave);
			$('li .val').eq(liParent).text(textPertanyaan);

			$('#pertanyaan-container').val(soalSave);

			var isi = '';

			if (soal.type == 'checkbox') {
				$('li .choices-container').eq(liParent).empty();
				choices.forEach(element => {
					isi += `<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="custom_checkbox_stacked_checked_disabled" checked="" disabled="">
					<label class="custom-control-label" for="custom_checkbox_stacked_checked_disabled">${element}</label>
					</div>`;
				});
			} else if (soal.type == 'radiogroup') {
				$('li .choices-container').eq(liParent).empty();
				choices.forEach(element => {       
					isi += `<div class="custom-control custom-radio">
					<input type="radio" class="custom-control-input" id="custom_radio_stacked_checked_disabled" checked="" disabled="">
					<label class="custom-control-label" for="custom_radio_stacked_checked_disabled">${element}</label>
					</div>`;
				});
			}

			$('#kondisi-container').val('');

			$('.choices-container').eq(liParent).append(isi);  
			$('#modal_cb').modal('hide');
		});

		$('#form_survey').submit(function(e) {
	  	// e.preventDefault();
	  	var inputs = $('.json_val');
	  	var inputCoy = $('.json_val').text()

	  	var inputContainer = ""
	  	$('.json_val').each(function() {
	  		inputContainer += ", " + $(this).text();
	  	})

	  	inputContainer = inputContainer.substring(2, inputContainer.length);

	  	var array = JSON.parse("[" + inputContainer + "]");
	  	var json_val = JSON.stringify(array)

	  	console.log(array);

	  	$("<input />").attr("type", "hidden")
	  	.attr("name", "pertanyaan")
	  	.attr("value", json_val)
	  	.appendTo("#form_survey");

	  	return;
	  })

		$('#jump_nav').click(function() {
			var choices = $('.choice-cb-rb');
			var i = 0;
			$('#jawaban_for_jump').empty();
			$('#loncat_ke').empty();

			var cbPertanyaan = $('#modal_cb_pertanyaan').val();
			var labelOption = `<option value="" disabled selected>Pilih Soal</option>`;
			$('#loncat_ke').append(labelOption);

			var defaultOption = `<option>Selanjutnya</option>`;
			$('#loncat_ke').append(defaultOption);

			$('.json_val').each(function() {
				var jsonValTemp = $(this).text();
				jsonVal = JSON.parse(jsonValTemp);

				if (soal.urutan != jsonVal.urutan) {
					var isiOption = `<option value="${jsonVal.urutan}">${jsonVal.urutan}. ${jsonVal.name}</option>`;
					$('#loncat_ke').append(isiOption);
				}
			})

			var exitOption = `<option value="exit">Keluar</option>`;
			$('#loncat_ke').append(exitOption);
			
				// <input type="checkbox" class="custom-control-input" value="${$(this).val()}" class="jump_choice" name="jump_choice"id="jump_choice${index}">
			choices.each(function(index) {
				var jawaban = `<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" value="${index}|${$(this).val()}" class="jump_choice" name="jump_choice" id="jump_choice${index}">
				<label class="custom-control-label" for="jump_choice${index}">${$(this).val()}</label>
				</div>`

				$('#jawaban_for_jump').append(jawaban)
			})
		})

		$('#btn_tambah_kondisi').click(function(e) {
			e.preventDefault();

			var kondisi = $('#kondisi_jawaban').val();
			var loncatKe = $('#loncat_ke').val();

			if (kondisi === null || loncatKe === null) {
				alert('Isi Pilih Kondisi dan Pilih Soal');
				return false;
			}

			var jumpChoice = [];
			var jumpChoiceVal = [];
			$.each($("input[name='jump_choice']:checked"), function() {            
				var val = $(this).val().split("|");
				jumpChoiceVal.push(val[0]);
				jumpChoice.push(val[1]);
			});

			// console.log(kondisi)
			// console.log(loncatKe)
			loncatKe = (loncatKe == "Selanjutnya") ? "selanjutnya" : loncatKe;
			var kondisiText = (kondisi == "1") ? "loncat ke" : "sembunyikan";

			var keterangan = '';
			if (jumpChoice.length) {
				keterangan = JSON.stringify(jumpChoice);
				keteranganVal = JSON.stringify(jumpChoiceVal);
			} else {
				keterangan = "tidak ada yang ";
				keteranganVal = ""
			}

			var isi = `
			<div class="alert alert-success alert-dismissible col-sm-12">
				<button type="button" class="close" data-dismiss="alert">
					<span class="close-condition"><i class="icon-trash"></i></span>
				</button>
				<span class="json-con d-none">{"a": ${keteranganVal}, "c": "${kondisiText}", "j":"${loncatKe}"}</span>
				Jika <span class="alert-link">${keterangan}</span> dipilih maka <span class="alert-link">${kondisiText}</span> soal nomer <span class="alert-link">${loncatKe}</span> 
			</div>`

			// var jsonVal = 

			$('.container-condition-answer').append(isi);
			// $('#jump-container').append('{hasJump:["c": "1", "jump": "3"]}');
			$(".jump_choice").prop('checked', false).parent().removeClass('active');

			$('.close-condition').click(function(e) {
		  	// e.preventDefault();
		  	// alert('uy')
		  })
		});

	  

	  $('.alert').on('closed.bs.alert', function () {
		  // do something…
		  console.log('uy')
		})

	  function noSoal() {
	  	i=0; $(".nox").each(function () { i++;
	  		$(this).html(i);
	  	});

	  	i=0; $(".json_val").each(function () { i++;
	  		var jsonVal = $(this).text();
	  		jsonVal = JSON.parse(jsonVal);
	  		jsonVal.urutan = i;

	  		$(this).text(JSON.stringify(jsonVal));
	  	});
	  }
	</script>
@stop
