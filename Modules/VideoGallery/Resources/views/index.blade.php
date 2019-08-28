@extends('layouts.backend.master')

@section('title', 'Manage Galery')
@section('menu', 'Manage Galery')
@section('submenu', 'Galeri Videos')
@section('submenu2', '')

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
						<h5 class="card-title"><i class="icon-images3"></i> Album Photo</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<button type="button" onclick="addVideo()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</button>
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
                                    <th class="text-center">No</th>
									<th>Nama Video</th>
									<th class="text-center">Publish</th>
									<th>Created at</th>
									<th class="text-center">Link</th>
									<th  style="width: 123;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
                                @php    
                                    $no =1 ;
                                @endphp
								@foreach($videos as $video)
									<tr>
                                        <td class="text-center">{{ $no++ }}</td>
										<td>{{ substr($video->video_name, 0, 50) }} </td>
										<td class="text-center">{{ $video->publish }}</td>
										<td>{{ $video->created_at }}</td>
										<td class="text-center">{{ $video->link }}</td>
										<td class="text-center" style="display: inline-block">
                                                                                                
												<button type="button" onclick="getEditVideo({{ $video->id }})" class="btn bg-success-400 btn-icon rounded-round" style="float: left;margin-right: 3px;"><i class="icon-pencil7"></i></button>     

												<form method="POST" action="{{ route('videogallery.delete', ['id' => $video->id]) }}" style="float:left;">
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
											{{ $videos->links() }}
								
									</td>
								</tr>
							
								
						
							</tbody>

					
						</table>

						
						<br>
					</div>
				</div>
        </div>
        
        <div id="modalAddVideo" class="modal fade"  tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h6 class="modal-title">TAMBAH VIDEO</h6>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <form action="{{ route('videogallery.store') }}" method="POST" id="formData" class="form-validate-jquery">
												<div class="modal-body">
						
														@csrf
																<div class="form-group">
																		<label>Nama Video</label>
																		<input type="text" name="nama_video" id="nama_video" class="form-control" required placeholder="Nama Video">
																</div>

																<div class="form-group">
																		<label>Link</label>
																		{{-- <input type="text" name="link" id="link" class="form-control" required placeholder="Link"> --}}
																		<textarea name="link" id="link" class="form-control" required placeholder="Masukan Link"></textarea>
																</div>  
																
																<div class="form-group">
																		<label>Publish</label>
																		
																			<select name="publish" id="publish" class="form-control">
																				<option value="" selected disabled> -- Pilih --</option>
																				<option value="Y" @if (isset($album_photo->publish) && $album_photo->publish == 'Y') selected @endif>Y</option>
																				<option value="N" @if (isset($album_photo->publish) && $album_photo->publish == 'N') selected @endif>N</option>
																			</select>
																	
																		<br>
																	
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
				function addVideo(){
					$('#modalAddVideo').modal('show');
				}


				function getEditVideo(id){
					$('form').trigger('reset');
					$('#modalAddVideo').modal('show');
					var url = "{{ route('videogallery.edit', ['id' => 'idVideoEdit']) }}".replace("idVideoEdit", id);
					var red = "{{ route('videogallery.update', ['id' => 'idVideo']) }}".replace("idVideo", id);

					$.ajax({
						url: url,
						method: 'GET',
						success: function(response){
							// console.log(response.name);
							$('#formData').removeAttr('action');
							$('#formData').attr('action', red);
							$('.modal-title').text('UPDATE VIDEO')
							$('.btn-action').text('Update')

							$('#nama_video').val(response.video_name);
							$('#link').val(response.link);
							$('#publish').val(response.publish);

						}
					})
				}
			
			</script>

@stop
