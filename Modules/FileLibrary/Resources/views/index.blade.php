@extends('layouts.backend.library_template')

@section('content')
<div class="col-md-12">
		<div class="card">
				@if (count($errors) > 0)
								<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br> 
												<ul>
														@foreach ($errors->all() as $error)
																<li>{{ $error }}</li>
														@endforeach
												</ul>
								</div>
				@endif
				<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-images3"></i> Koleksi File</h5>
						<div class="header-elements">
                {{-- @if($role['read'] == "TRUE") --}}
                  <button onclick="addFile()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-upload"></i></b> Upload</button>
                {{-- @endif --}}
							
	              </div>
					</div>


					<div class="card-body">
							<style>
									.btnaction a:hover{
													color: white;
									}

									.gallery
									{
										display: inline-block;
										margin-top: 20px;
									}
								</style>
							<div class="alert alert-info alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
									<span class="font-weight-semibold"></span> Copy link file untuk menambahkan pada text editor
									<button type="button" class="close" data-dismiss="alert">×</button>
							</div>
							<h6 class="font-weight-semibold"><i class="icon-help mr-2"></i> Perhatian</h6>
							<p>Anda bisa meng-upload file berbagai jenis ekstensi (pdf,docs,xls), Max Size 5 MB</p>
							
							<div class="table-responsive mt-5">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Judul/Nama File</th>
											<th>URL, Lokasi File</th>
											<th>Created at</th>
											<th>Opsi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($filelibrary as $file)
											<tr>
											<td>{{ $file->nama_file }}</td>
											<td>{{ url(Storage::url($file->path))  }}</td>
											<td>{{ $file->created_at }}</td>
											<td>
											<a onclick="return confirm('Apakah anda yakin akan menghapus file ini?')" href="{{ route('filelibrary.delete', ['id' => $file->id]) }}" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
											</td>
											</tr>
												
										@endforeach
									</tbody>
								</table>
							</div>
					
							<div class="row text-center text-lg-left">
						
							</div>
				</div>
		</div>
</div>

<div id="modalAdd" class="modal fade"  tabindex="-1"  aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h6 class="modal-title">UPLOAD FILE</h6>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

			<form action="{{ route('filelibrary.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
					<div class="modal-body">
								@csrf
								<div class="form-group">
									<label>Nama File</label>
									<input type="text" name="title" id="title" required class="form-control" placeholder="Nama Gambar">
								</div>

							

								<div class="form-group">
									<label>File</label>
									<input type="file" name="filename" id="filename" required>
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
       

			function addFile(){
				$('#modalAdd').modal('show');
			}

			function extraBtn(param, id){
        if(param == 'show'){
          $('.hoverback'+id).show();
        }else{
          $('.hoverback'+id).hide();
        }
      }

      function deleteGambar(){
        var tanya = 'apakah anda yakin?';

        if(confirm(tanya)){
          $('#deletePhoto').submit();
        }
      }
      
			function copyLink(id) {
				// $('#link'+id).tooltip({
     
				// 		disabled: true,
				// 		close: function( event, ui ) { $(this).tooltip('disable'); }
				// });
				// variable content to be copied
				var copyText = $('#link'+id).val();
				// create an input element
				let input = document.createElement('input');
				// setting it's type to be text
				input.setAttribute('type', 'text');
				// setting the input value to equal to the text we are copying
				input.value = copyText;
				// appending it to the document
				document.body.appendChild(input);
				// calling the select, to select the text displayed
				// if it's not in the document we won't be able to
				input.select();
				// calling the copy command
				document.execCommand("copy");
				// removing the input from the document
				document.body.removeChild(input)
				// $(this).tooltip('enable').tooltip('open');

				alert('link copied');
			}

			
		</script>
@stop
