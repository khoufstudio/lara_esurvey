@extends('layouts.backend.master')

@section('title', 'Manage Content Web')
@section('menu', 'Manage Content Web')
@section('submenu', 'Manage File')
@section('submenu2', 'File Uploads')

@section('content')
@php
		$uri = Request::segment(4);
@endphp
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
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-newspaper"></i> File Upload</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<button class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addFile()"><b><i class="icon-plus3"></i></b> Upload File</button>
						@endif
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
						
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
                  <th>No</th>
									<th>Nama FIle</th>
									<th>Kategori</th>
									{{-- <th>Publish</th> --}}
									<th>Created at</th>
									<th>By</th>
									<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
                @php ($no = 1)
								@foreach($file_uploads as $file)
									<tr>
                    <td>{{ $no++ }}</td>
									  
										<td><a href="{{ Storage::url($file->path) }}" target="_blank">{{ $file->file_name }}</a></td>
										<td>
											@foreach ($file->file_categories as $file_name)
													{{ $file_name->nama_kategori }}
											@endforeach
										</td>
										{{-- <td>{{ $file->publish }}</td> --}}
										<td>{{ $file->created_at }}</td>
										<td>{{ $file->create_author }}</td>
										<td class="text-center" style="display: inline-block">
												<button type="button" onclick="getEditFile({{ $file->id }})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button>     

												<form method="POST" action="{{ route('file_upload.delete', ['id' => $file->id]) }}" style="float:left;margin-right: 10px;">
														{!! csrf_field() !!}
														<button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn bg-danger-400 btn-icon rounded-round">
																<i class="icon-trash"></i>
														</button>
										</form>
												
										</td>
									</tr>
								@endforeach

								<tr>
									<td  colspan="8">
											{{-- {{ $file_uploads->links() }} --}}
								
									</td>
								</tr> 

								{{-- {{ dd($file_uploads->all()) }} --}}
							
								
						
							</tbody>

					
						</table>

						
						<br>
					</div>
				</div>
		</div>


		<div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">UPLOAD FILE</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('file_upload.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
						<div class="modal-body">
				
						   	 @csrf
									<div class="form-group row">
										<label for="" class="col-md-2 col-form-label">Nama File</label>
										<div class="col-md-8">
											<input type="text" name="file_name" id="file_name" class="form-control" required placeholder="Nama File" required>
										</div>

									</div>

									<div class="form-group row">
										<label for="" class="col-md-2 col-form-label">Kategori</label>
										<div class="col-md-8">
												<select name="id_kategori" class="form-control" id="id_kategori">
													<option value="" selected disabled>-- Pilih --</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" @if($uri != 'create') @if($category->id == $file->category) selected @endif @endif> {{ $category->nama_kategori	 }}</option>		
													@endforeach
												</select>
										</div>

									</div>

									<div class="form-group row">
										<label for="" class="col-md-2 col-form-label">Deskripsi</label>
										<div class="col-md-8">
											<textarea name="file_desc" id="file_desc" rows="5" class="form-control"></textarea>
										</div>

									</div>

									<div class="form-group row">
										<label for="" class="col-md-2 col-form-label">File</label>
										<div class="col-md-8">
											<input type="file" name="file" id="file" required>
											<em><small>Jenis File yang di ijinkan PDF, max: 2MB</small></em>

											<br>
											<a href="" id="linkFile" style="display: none"></a>
										</div>

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
	$(document).ready(function(){
		 $(".btn-class").click(function(){
				 console.log('test')
		 });

		 $('#category').select2({
					placeholder: {
						id: '',
						text: 'Select Option'
					}
				});
	});



	function addFile(){
		var red = "{{ route('file_upload.store') }}";

		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('.password-field').show();
		$('.modal-title').text('UPLOAD FILE');
		$('.btn-action').text('Simpan');
		
		$('#formData').removeAttr('action');
		$('#formData').attr('action', red);

		$('#linkFile').hide();
	}

	function getEditFile(id){
		$('form').trigger('reset');
		$('#modal_theme_info').modal('show');
		$('#linkFile').show();

		var url = "{{ route('file_upload.edit', ['id' => 'idFileEdit']) }}".replace('idFileEdit', id);;
		var red = "{{ route('file_upload.update', ['id' => 'idFile']) }}".replace("idFile", id);

		$.ajax({
			url: url,
			method: 'GET',
			success: function(response){
				// console.log(response.name);
				$('#formData').removeAttr('action');
				$('#formData').attr('action', red);
				$('.modal-title').text('UPDATE FILE')
				$('.btn-action').text('Update')

				$('#file_name').val(response.file_name);
				$('#id_kategori').val(response.id_kategori);
				$('#file_desc').val(response.file_desc);

				var link = "{{ Storage::url('linkFile') }}".replace('linkFile', response.path);
				$('#linkFile').attr('href', link);
				$('#linkFile').text(response.file_name);
				// $('#id_user_group').val(response.id_user_group);
			}
		})
	}
</script>


@stop
