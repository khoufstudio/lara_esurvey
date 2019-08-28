@extends('layouts.backend.library_template')

@section('content')
	<div class="col-md-12">
		<div class="card">
				<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-images3"></i> Media Images</h5>
						<div class="header-elements">
                {{-- @if($role['read'] == "TRUE") --}}
                  <button onclick="addPhoto()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-upload"></i></b> Upload</button>
                {{-- @endif --}}
							
	              </div>
					</div>
					<hr class="mt-2">
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
									<span class="font-weight-semibold"></span> Copy link gambar untuk menambahkan pada text editor
									<button type="button" class="close" data-dismiss="alert">×</button>
							</div>
							<h6 class="font-weight-semibold"><i class="icon-help mr-2"></i> Perhatian</h6>
							<p>Anda bisa meng-upload gambar berbagai jenis ekstensi (jpeg,png,jpg,gif,svg), Max Size 2 MB</p>
							

					
							<div class="row text-center text-lg-left">
								@foreach ($imagelibraries as $image)
										
								<div class="col-lg-2 col-md-4 col-6" onmouseover="extraBtn('show', {{$image->id}})" onmouseout="extraBtn('hide', {{$image->id}})">
										
										<img class="img-fluid img-thumbnail" src="{{ asset('images/media/thumbnail/'.$image->path) }}" alt="">
										
										
										<div class="hoverback{{$image->id}}" style="position: absolute;
																										top: 0;
																										background: rgba(0,0,0,0.5);
																										width: 92%;
																										height: 100%;
																										display:none">
										<div class="btnaction" style="position: relative;
										top: 50%;
										left: 27%;
										color: white;display:inline-flex">
		
									
										<a href="{{ asset('images/media/thumbnail/'.$image->path) }}" class="d-block fancybox mr-2" rel="ligthbox"><i class="icon-zoomin3"></i> </a>
										<a href="javascript:void(0)"  onclick="deleteGambar()" data-toggle="tooltip" title="Delete"  data-placement="top" title="Delete" class=""><i class="icon-trash"></i></a>
										
									<form method="POST" id="deletePhoto" action="{{ route('cms.imagelibrary.delete', ['id' => $image->id]) }}" style="float:left;margin-right: 10px;">
												@csrf
												
											</form>
											
										<input type="hidden" value="{{ asset('images/media/thumbnail/'.$image->path) }}" id="link{{ $image->id }}">
											<a href="javascript:void(0)" class="mr-2" onclick="copyLink({{ $image->id }})" data-toggle="tooltip"  data-placement="top" title="Copy Link"><i class="icon-link"></i></a>
											
											
											
											
										</div> 
										
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>

	</div>


	<div id="modalAdd" class="modal fade"  tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">UPLOAD GAMBAR</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

				<form action="{{ route('cms.imagelibrary.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
						<div class="modal-body">
						   	 @csrf
									<div class="form-group">
										<label>Nama Gambar</label>
										<input type="text" name="title" id="title" required class="form-control" placeholder="Nama Gambar">
									</div>

								

									<div class="form-group">
										<label>File Gambar</label>
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
        $(document).ready(function(){
					$(".fancybox").fancybox({
							openEffect: "none",
							closeEffect: "none"
					});
        });

			function addPhoto(){
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
