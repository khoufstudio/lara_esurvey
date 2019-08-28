@extends('layouts.backend.master')


@section('title', 'Manage Gallery')
@section('menu', 'Manage Gallery')
@section('submenu', 'Gallery Photos')
@section('submenu2', 'Album Gallery')


@section('content')
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
						<h5 class="card-title"><i class="icon-newspaper"></i> Album Gallery</h5>
						<div class="header-elements">
                @if($role['read'] == "TRUE")
                  <button onclick="addPhoto()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</button>
                @endif
							
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
              <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
              <style>
                .gallery
                {
                  display: inline-block;
                  margin-top: 20px;
                }
             
              </style>
        
                
                  <hr class="mt-2 mb-5">
                  <div class="row text-center text-lg-left">
                    
                    @foreach ($photo_galeries as $photogalery)
                      <div class="col-lg-3 col-md-4 col-6" onmouseover="extraBtn('show', {{$photogalery->id}})" onmouseout="extraBtn('hide', {{$photogalery->id}})">
                      
                        <img class="img-fluid img-thumbnail" src="{{ asset('images/image_galleries/thumbnail/'.$photogalery->file_foto) }}" alt="">
                       

                        <div class="hoverback{{$photogalery->id}}" style="position: absolute;
                                                      top: 0;
                                                      background: rgba(0,0,0,0.5);
                                                      width: 94%;
                                                      height: 100%;
                                                      display:none">
                          <div class="btnaction" style="position: relative;
                          top: 50%;
                          left: 40%;
                          color: white;display:inline-flex">

                          <style>
                            .btnaction a:hover{
                              color: white;
                            }
                          </style>
                            <a href="{{ asset('images/image_galleries/thumbnail/'.$photogalery->file_foto) }}" class="d-block fancybox mr-2" rel="ligthbox"><i class="icon-zoomin3"></i> </a>
                            <a href="javascript:void(0)" onclick="deletePhoto()" data-toggle="tooltip"  data-placement="top" title="Delete" class="mr-2"><i class="icon-trash"></i></a>

                            <form method="POST" id="deletePhoto" action="{{route('album_photo.image_galleries.delete', ['id' => $photogalery->id]) }}" style="float:left;margin-right: 10px;">
                                @csrf

                            </form>
                               
                            @if($photogalery->publish == 'Y')
                              <a href="javascript:void(0)" class="mr-2" onclick="updatePhoto()" data-toggle="tooltip"  data-placement="top" title="Unpublish?"><i class="icon-eye-blocked2"></i></a>

                              <form method="POST" id="updatePhoto" action="{{route('album_photo.image_galleries.update', ['id' => $photogalery->id]) }}" style="float:left;margin-right: 10px;">
                                  @csrf
                                <input type="hidden" name="publish" value="N">
                              </form>
                            @else
                              <a href="javascript:void(0)" class="mr-2" onclick="updatePhoto()" data-toggle="tooltip" data-placement="top" title="Publish?"><i class="icon-eye2"></i></a>
                              <form method="POST" id="updatePhoto" action="{{route('album_photo.image_galleries.update', ['id' => $photogalery->id]) }}" style="float:left;margin-right: 10px;">
                                  @csrf
                                  <input type="hidden" name="publish" value="Y">
                              </form>
                            @endif
                            
                          </div> 
                          
                        </div>
                      </div>
                    @endforeach
                  
                  </div>
                
              
                <!-- /.container -->
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

					<form action="{{ $route }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
						<div class="modal-body">
				
						   	 @csrf
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
			
			CKEDITOR.replace('albumphoto_desc_eng');


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

      function deletePhoto(){
        var tanya = 'apakah anda yakin?';

        if(confirm(tanya)){
          $('#deletePhoto').submit();
        }
      }
      
      function updatePhoto(){
        var tanya = 'apakah anda yakin?';

        if(confirm(tanya)){
          $('#updatePhoto').submit();
        }
      }
		</script>
@stop