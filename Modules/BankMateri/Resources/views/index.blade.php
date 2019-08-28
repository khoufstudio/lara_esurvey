@extends('layouts.backend.master')


@section('title', 'Arsip')
@section('menu', 'Arsip')
@section('submenu', 'Home')
@section('submenu2', '')

@section('content')
	<div class="col-md-12">
		<div class="card">
			{{-- <div class="card-header header-elements-inline">
				<h5 class="card-title"><i class="icon-menu2"></i> Arsip</h5>
				<div class="header-elements">
						@if($role['insert'] == "TRUE")
							<a href="{{ route('bankmateri.create') }}" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</a>
						@endif
	              </div>
			</div> --}}
			{{-- <legend class="text-uppercase font-size-sm font-weight-bold"></legend> --}}
			@php 
				$cek_keyword = Session::has('sess_keyword');
				$sess_keyword = Session::get('sess_keyword');

				$cek_pdari = Session::has('sess_periodedari');
				$sess_pdari = Session::get('sess_periodedari');

				$cek_psampai = Session::has('sess_periodesampai');
				$sess_psampai = Session::get('sess_periodesampai');
			
			@endphp

			
			<div class="row">
				<div class="col-lg-6">
						<form action="{{ route('bankmateri.post') }}" method="POST" style="padding: 20px">
								@csrf
								<h5 class=""> <u>	<i class="icon-filter4"></i>Filter Arsip:</u></h5>
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Direktorat</label>
										<div class="col-lg-9">
												<select name="direktorat" id="direktorat" class="form-control" onchange="getSubdit(this.value)">
													<option value="" selected disabled>Pilih</option>
													@foreach ($direktorats as $direktorat)
														<option value="{{ $direktorat->id }}">{{ $direktorat->nama_direktorat }}</option>
													@endforeach
												</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Subdit</label>
										<div class="col-lg-8">
												<select name="subdit" id="subdit" class="form-control" >
														<option value="" selected disabled>Pilih Subdit</option>
												</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Kategori Surat</label>
										<div class="col-lg-5">
												<select name="kategori_surat" id="kategori_surat" class="form-control"  onchange="getJenis(this.value)">
													<option value="" selected disabled>Pilih</option>
													<option value="1">Masuk</option>
													<option value="2">Keluar</option>
												</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Jenis Surat</label>
										<div class="col-lg-4">
												<select name="jenis_surat" id="jenis_surat" class="form-control">
														<option value="" selected disabled>Pilih</option>
														
													</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Status</label>
										<div class="col-lg-3">
												<select name="status" id="status" class="form-control">
													<option value="" selected disabled>Pilih</option>
													<option value="1">Aktif</option>
													<option value="0">Tidak Aktif</option>
												</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-3">Periode</label>
										<div class="col-lg-8">
													<div class="row">
														<div class="col-md-6"><p><input type="text" name="pdari" value="@if($cek_pdari) {{$sess_pdari}} @endif" class="form-control" id="rangeDemoStart" placeholder="Dari Tanggal" readonly=""></p></div>
														<div class="col-md-6"><p><input type="text" name="psampai" value="@if($cek_psampai) {{$sess_psampai}} @endif" class="form-control" id="rangeDemoFinish" placeholder="Sampai Tanggal" readonly=""></p>
														</div>
													</div>
													
											{{-- <input type="text" name="periode" value="@if($cek_pdari || $cek_psampai) {{$sess_pdari}} - {{$sess_psampai}} @else dd/mm/yyyy - dd/mm/yyyy  @endif" class="form-control daterange-basic" > --}}
										</div>
									</div>
				
									<div class="form-group row">
											<label class="col-form-label col-lg-3">Pencarian</label>
											<div class="col-lg-9">
												<input type="text" name="keyword" class="form-control" value="@if($cek_keyword) {{$sess_keyword}} @endif" placeholder="Cari, No surat/Perihal">
											</div>
									</div>
				
									<div class="form-group row">
											<label class="col-form-label col-lg-3"></label>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-info btn-block"> <i class="icon-search4"></i> Cari</button>
											</div>
									</div>
								</fieldset>
							</form>
				</div>

				<div class="col-lg-6">
					{{-- <div class="card jumbotron">
						<div class="card-body">
						Menampilkan Pencarian berdasarkan <span style="color:red;font-weight:bold">periode: {{$sess_pdari}} - {{$sess_psampai}}, Keyword: {{ $sess_keyword}}</span> <br>
						<a href="{{ route('cleardata.arsips') }}">Hapus Pencarian</a></p>
						</div>
					</div> --}}
				</div>
			</div>

			<legend class="text-uppercase font-size-sm font-weight-bold"></legend>
			<div class="table-responsive">
					<div class="card-header header-elements-inline">
							<h5 class="card-title"><i class="icon-menu2"></i> Arsip</h5>
							<div class="header-elements">
									@if($role['insert'] == "TRUE")
										<a href="{{ route('bankmateri.create') }}" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</a>
									@endif
											</div>
						</div>
				<table class="table">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>No.Surat</th>
							<th>Perihal</th>
							<th>Jenis Surat</th>
							<th>Bagian</th>
							<th width="200">Status</th>
							<th>Ket</th>
							<th class="text-center" style="width: 200px;"><i class="icon-menu-open2"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach($arsips as $arsip)
							<tr>
								<td>{{ date('d M Y', strtotime($arsip->tgl_surat)) }}</td>
								<td>{{ $arsip->no_surat }}</td>
								<td>{{ $arsip->perihal }}</td>
								<td>{{ $arsip->nama_surat }}</td>
								<td>
									Direktorat : {{ $arsip->nama_direktorat }} <br>
									Subdit: {{ $arsip->nama_subdit }}
								</td>
								<td>
									@php
										$dateNow = date('Y-m-d');		
									@endphp
									@if($arsip->status == 1 && date('Y-m-d', strtotime($arsip->masa_aktif)) >= $dateNow)
										
										<span class="badge badge-success">Aktif</span> <br>
										Masa Aktif: <span style="color:green">{{ date('d M Y', strtotime($arsip->masa_aktif)) }}</span>
									@else
										<span class="badge badge-danger">Tidak Aktif</span> <br>
										Masa Aktif: <span style="color:red">{{ date('d M Y', strtotime($arsip->masa_aktif)) }}</span>
									@endif
								</td>
								<td>{{ $arsip->ket }}</td>
								<td class="text-center" style="display: inline-block">
										<a href="{{ route('bankmateri.download', ['id' => $arsip->id]) }}" class="btn bg-danger-400 btn-icon rounded-round" target="_blank"><i class="icon-trash"></i></a>
										
										<a href="{{ route('bankmateri.edit', ['id' => $arsip->id]) }}" class="btn bg-success-400 btn-icon rounded-round" ><i class="icon-pencil7"></i></a>

										<a href="{{ url(Storage::url($arsip->file_doc))  }}" target="_blank" class="btn bg-primary-400 btn-icon rounded-round" ><i class="icon-zoomin3"></i></a>
									

								</td>
							</tr>
						@endforeach

						<tr>
							<td  colspan="8">
									{{-- {{ $arsips->links() }} --}}
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
@stop

@section('script')
	<script>


				function getJenis(idkategori){
					var url = "{{ route('jenissurat.getjenis', ['id' => 'idJenis']) }}".replace("idJenis", idkategori);

					$.ajax({
					url: url,
					method: 'GET',
					success: function(response){
						// console.log(response.nam);
						console.log(response);

						$('#jenis_surat').html(response);
						
					}
				})
			}
			function getSubdit(idBagian){
					var url = "{{ route('bankmateri.getsubdit', ['id' => 'idJenis']) }}".replace("idJenis", idBagian);

					$.ajax({
					url: url,
					method: 'GET',
					success: function(response){
						// console.log(response.nam);
						console.log(response);
						$('#subdit').show();
			
						$('#subdit').html(response);
						
					}
				})
			}
	</script>
@stop
