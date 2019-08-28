@extends('layouts.backend.master')


@section('title', 'Jenis Surat')
@section('menu', 'Jenis Surat')
{{-- @section('submenu', 'Home') --}}
@section('submenu2', '')

@section('content')
		@if ($errors->any())
				<div class="alert alert-danger">
						<ul>
								@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
								@endforeach
						</ul>
				</div>
		@endif
	<div class="col-md-12">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title"><i class="icon-newspaper"></i> Jenis Surat</h5>
				<div class="header-elements">
						@if($role['insert'] == "TRUE")
                        <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addData()"><b><i class="icon-plus3"></i></b> Tambah</button>
							
						@endif
	      </div>
			</div>
			<div class="card-body">

					
						<form action="{{ route('jenissurat.post') }}" method="POST">
							@csrf						
							
							@php 
								$cek = Session::has('search_jenissurat');
								$sess_cari = Session::get('search_jenissurat');
							
							@endphp
								<div class="input-group col-md-5">
									<input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Nama jenis surat" required minlength="3">
									<div class="input-group-append">
										<button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
									</div>
								</div>
	
								
							</form>
							@if($cek)
						<p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata.jenissurat') }}">Hapus Pencarian</a></p>
	
							@endif
						
				
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>	
						<tr>
							<th width="50">No</th>
							<th>Nama Surat</th>
							<th>Jenis</th>
							<th width="200">Status</th>
							<th width="250">Opsi</th>
						</tr>
					</thead>
							@php
								$no =1;		
							@endphp
							@if($jeniss->count() > 0)
							@foreach ($jeniss as $Jenis)
								<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $Jenis->nama_surat }}</td>
								<td>
										@if ($Jenis->id_jenis == 1)
											Surat Masuk
										@else
											Surat Keluar
										@endif
									
											
								</td>
								<td>
									@if ($Jenis->status == 1)
											Aktif
									@else
											Tidak Aktif
									@endif
								</td>

								<td>
								
								{{-- <a href="{{ route('direktorat.jenis_surat') }}" class="btn btn-success">Jenis Surat</a> --}}
									<button onclick="getEditData({{ $Jenis->id }})" class="btn btn-success btn-sm"><i class="icon-pencil7"></i></button>
								<a href="{{ route('jenissurat.delete', ['id' => $Jenis->id])}}" onclick="return confirm('Apakah anda yakin akan menghapus?')" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
								</td>
								</tr>
							@endforeach

							@else
							<tr>
								<td colspan="5" class="text-center">Tidak ada data</td>
							</tr>
							@endif

							<tr>
								<td  colspan="8">
										{{ $jeniss->links() }}
							
								</td>
							</tr>
					<tbody>
						
					</tbody>
				</table>
			</div>

		</div>
    </div>
    


    <div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h6 class="modal-title">TAMBAH SURAT</h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <form action="{{ route('jenissurat.store') }}" method="POST" id="formData" class="form-validate-jquery">
                    <div class="modal-body">
            
											@csrf
												<div class="form-group">
														<label>Nama Jenis Surat</label>
														<input type="text" name="nama_surat" id="nama_surat" class="form-control" required placeholder="Nama Surat">
												</div>

												<div class="form-group">
														<label for="">Kategori Surat</label>
														<select name="jenis_surat" class="form-control" id="jenis_surat">
																<option value="" selected disabled> -- Pilih --</option>
																<option value="1">Surat Masuk</option>
																<option value="2">Surat Keluar</option>
														</select>
												</div>
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control col-md-3" required>
														<option value="" selected disabled> -- Pilih -- </option>
														<option value="1">Aktif</option>
														<option value="2">Tidak Aktif</option>
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
        
		function addData(){
			var red = "{{ route('jenissurat.store') }}";

			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');

			$('.modal-title').text('TAMBAH SURAT');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);


        }
        


    function getEditData(id){
			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			var url = "{{ route('jenissurat.edit', ['id' => 'idJenisEdit']) }}".replace("idJenisEdit", id);
			var red = "{{ route('jenissurat.update', ['id' => 'idJenis']) }}".replace("idJenis", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					// console.log(response.nam);

					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE SURAT')
					$('.btn-action').text('Update')
					$('#nama_surat').val(response.nama_surat);
					$('#jenis_surat').val(response.id_jenis);
					$('#status').val(response.status);
					
				}
			})
		}

    </script>
@stop
