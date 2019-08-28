@extends('layouts.backend.master')

@section('title', 'Manage Content Web')
@section('menu', 'Manage Content Web')
@section('submenu', 'Sliders')
@section('submenu2', '')

@section('content')
@php
    use Modules\BlogCategory\Entities\BlogCategory;
@endphp
<div class="col-md-12">
    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-newspaper"></i> Sliders</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<button type="button" onclick="addSlider()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</button>
						@endif
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
						<form action="{{ route('sliders.post') }}" method="POST">
							@csrf						
							
							@php 
								$cek = Session::has('search_slider');
								$sess_cari = Session::get('search_slider');
							
							@endphp
								<div class="input-group col-md-5">
									<input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Nama Slider" required minlength="3">
									<div class="input-group-append">
										<button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
									</div>
								</div>

								
							</form>
							@if($cek)
						<p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata.slider') }}">Hapus Pencarian</a></p>

							@endif
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
                                    <th>No</th>
									<th>Gambar</th>
									<th>Nama Slider</th>

									<th>Publish</th>
									<th>Created at</th>
									<th>By</th>
									<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
								@if($sliders->count() > 0)
                @php ($no = 1)
								@foreach($sliders as $slider)
									<tr>
                    <td>{{ $no++ }}</td>
									  <td><img src="{{ asset('images/sliders/thumbnail/'.$slider->gambar) }}" alt="" width="100" height=70></td>
										<td>{{ $slider->slider_name }}</td>
								
										<td>{{ $slider->publish }}</td>
										<td>{{ $slider->created_at }}</td>
										<td>{{ $slider->create_author }}</td>
										<td class="text-center" style="display: inline-block">
												<button type="button" onclick="getEditSlider({{ $slider->id }})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button>     

												<form method="POST" action="{{ route('slider.delete', ['id' => $slider->id]) }}" style="float:left;margin-right: 10px;">
														{!! csrf_field() !!}
														<button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn bg-danger-400 btn-icon rounded-round">
																<i class="icon-trash"></i>
														</button>
										</form>
												
										</td>
									</tr>
								@endforeach
								@else
								<tr>
									<td colspan="7" class="text-center">Tidak ada data</td>
								</tr>
								@endif

								<tr>
									<td  colspan="8">
											{{ $sliders->links() }}
								
									</td>
								</tr> 
							
								
						
							</tbody>

					
						</table>

						
						<br>
					</div>
				</div>
		</div>


		<div id="modalAdd" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">TAMBAH PHOTO</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('slider.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
						<div class="modal-body">
				
									@csrf
									<div class="form-group">
											<label>Nama Slider</label>
											<input type="text" name="nama_slider" id="nama_slider" class="form-control" required placeholder="Nama Slider">
									</div>
									<div class="form-group">
										<label>Link</label>
										<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
									</div>
									<div class="form-group">
										<label>Publish</label>
										<select name="publish" id="publish" class="form-control col-md-5" required>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="Y">Y</option>
                      <option value="N">N</option>
                    </select>
									</div>

								

									<div class="form-group">
										<label>Photo</label>
										<input type="file" name="filename" id="filename" required>
									</div>

									<div class="form-group" id="image">
										<img src="" alt="" style="width: 200px;height:100px" id="img-slider">
									</div>
		           
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn bg-info btn-action" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
					</div>
				</form>
				</div>
			</div>
		</div>
@stop

@section('script')
	
		<script>

			 function addSlider(){
				$('#modalAdd').modal('show');
				var red = "{{ route('slider.store') }}";

				$('form').trigger('reset');
				$('.modal-title').text('TAMBAH SLIDER');
				$('.password-field').show();
				$('#image').hide();
				$('.btn-action').text('Simpan');
				
				$('#formData').removeAttr('action');
				$('#formData').attr('action', red);
			 }
			 
			 function getEditSlider(id){
					$('form').trigger('reset');
					$('#filename').removeAttr('required');
					$('#modalAdd').modal('show');
					$('#image').show();

					var url = "{{ route('slider.edit', ['id' => 'idSliderEdit']) }}".replace('idSliderEdit', id);;
					var red = "{{ route('slider.update', ['id' => 'idSlider']) }}".replace("idSlider", id);
					
					$.ajax({
						url: url,
						method: 'GET',
						success: function(response){
							console.log(response.name);
							var img = "{{ asset('images/sliders/thumbnail/imageslider') }}".replace('imageslider', response.gambar);

							$('.password-field').hide();

							$('#formData').removeAttr('action');
							$('#formData').attr('action', red);
							$('.modal-title').text('UPDATE SLIDER')
							$('.btn-action').text('Update')

							$('#img-slider').attr('src', img);
							$('#nama_slider').val(response.slider_name);
							$('#link').val(response.link);
							$('#publish').val(response.publish);
						
						}
					})
				}
		
		</script>

@stop
