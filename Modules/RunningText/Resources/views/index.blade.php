@extends('layouts.backend.master')

@section('title', 'Manage Content Web')
@section('menu', 'Manage Content Web')
@section('submenu', 'Running Text')
@section('submenu2', '')

@section('content')
<div class="col-md-12">
		<div class="card">
				<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-text-width"></i> Running Text</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<button type="button" onclick="addRunningText()" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</button>
						@endif
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
							<form action="{{ route('runningtext.post') }}" method="POST">
									@csrf						
									
									@php 
										$cek = Session::has('search_runningtext');
										$sess_cari = Session::get('search_runningtext');
									
									@endphp
										<div class="input-group col-md-5">
											<input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Nama Running Text" required minlength="3">
											<div class="input-group-append">
												<button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
											</div>
										</div>
		
										
									</form>
									@if($cek)
								<p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata.runningtext') }}">Hapus Pencarian</a></p>
		
									@endif
					</div>


					<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Link</th>
										<th>Publish</th>
										<th>Created at</th>
								
										<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
									</tr>
								</thead>
								<tbody>
									@if($runningtext->count() > 0)
									@php ($no = 1)
									@foreach($runningtext as $runningtex)
										<tr>
											<td>{{ $no++ }}</td>
											
											<td>{{ $runningtex->title }}</td>
											<td>{{ $runningtex->link }}</td>
									
											<td>{{ $runningtex->publish }}</td>
											<td>{{ $runningtex->created_at }}</td>
								
											<td class="text-center" style="display: inline-block">
													<button type="button" onclick="getEditRunningText({{ $runningtex->id }})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button>     
	
													<form method="POST" action="{{ route('runningtext.delete', ['id' => $runningtex->id]) }}" style="float:left;margin-right: 10px;">
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
												{{ $runningtext->links() }}
									
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
					<h6 class="modal-title">TAMBAH RUNNINGTEXT</h6>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<form action="{{ route('runningtext.store') }}" method="POST" id="formData" class="form-validate-jquery" enctype="multipart/form-data">
					<div class="modal-body">
			
								@csrf
								<div class="form-group">
										<label>Judul Running Text</label>
										<input type="text" name="title" id="title" class="form-control" required placeholder="Judul">
								</div>
								<div class="form-group">
									<label>Link</label>
									<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
								</div>

								<div class="form-group">
										<label>Deskripsi</label>
										<textarea name="descripsi" id="descripsi" class="form-control" required placeholder="Link"></textarea>
								</div>

								<div class="form-group">
									<label>Publish</label>
									<select name="publish" id="publish" class="form-control col-md-5" required>
										<option value="" selected disabled>-- Pilih --</option>
										<option value="Y">Y</option>
										<option value="N">N</option>
									</select>
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
		
		function addRunningText(){
			$('#modalAdd').modal('show');
			var red = "{{ route('runningtext.store') }}";

			$('form').trigger('reset');
			$('.modal-title').text('TAMBAH RUNNING TEXT');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);
		}

		function getEditRunningText(id){
					$('form').trigger('reset');
					$('#modalAdd').modal('show');

					var url = "{{ route('runningtext.edit', ['id' => 'idRunningtextEdit']) }}".replace('idRunningtextEdit', id);;
					var red = "{{ route('runningtext.update', ['id' => 'idRunningtext']) }}".replace("idRunningtext", id);
					
					$.ajax({
						url: url,
						method: 'GET',
						success: function(response){
							console.log(response.name);
				



							$('#formData').removeAttr('action');
							$('#formData').attr('action', red);
							$('.modal-title').text('UPDATE RUNNINGTEXT')
							$('.btn-action').text('Update')


							$('#title').val(response.title);
							$('#link').val(response.link);
							$('#descripsi').val(response.desc);
							$('#publish').val(response.publish);
						
						}
					})
				}
	</script>

@endsection