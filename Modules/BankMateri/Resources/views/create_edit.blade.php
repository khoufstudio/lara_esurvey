@extends('layouts.backend.master')


@section('title', 'Arsip')
@section('menu', 'Arsip')
@section('submenu', $condition = (isset($editpage)) ? 'Edit' : 'Tambah')
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
			<h5 class="card-title"><i class="icon-newspaper"></i> {{ $condition }} Arsip</h5>
		</div>

		<div class="card-body">
			<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
				@csrf
				<fieldset class="mb-3">
					<legend class="text-uppercase font-size-sm font-weight-bold"></legend>

					<div class="form-group row">
						<label class="col-form-label col-lg-2">Kategori Surat</label>
						<div class="col-lg-3">
							<select name="kategori_surat" id="kategori_surat" class="form-control"  onchange="getJenis(this.value)">
								<option value="" selected disabled>Pilih</option>
								<option value="1" value="{{ $arsip->kategori ?? old('kategori_surat') }}" @if(isset($arsip->kategori) && $arsip->kategori == 1) selected @endif>Masuk</option>
								<option value="2" value="{{ $arsip->kategori ?? old('kategori_surat') }}" @if(isset($arsip->kategori) && $arsip->kategori == 2) selected @endif>Keluar</option>
							</select>
							{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
						</div>
					</div>

					<div class="form-group row">
							<label class="col-form-label col-lg-2">Jenis Surat</label>
							<div class="col-lg-3">
								<select name="jenis_surat" id="jenis_surat" class="form-control">
									<option value="" selected disabled>Pilih</option>
									
								</select>
								{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
							</div>
						</div>
					
					<div class="form-group row">
						<label class="col-form-label col-lg-2">Perihal</label>
						<div class="col-lg-8">
							<input type="text" name="perihal" class="form-control" value="{{ $arsip->perihal ?? old('perihal') }}" >
						</div>
					</div>
					
					<div class="form-group row">
							<label class="col-form-label col-lg-2">No Surat</label>
							<div class="col-lg-8">
								<input type="text" name="no_surat" class="form-control" value="{{ $arsip->no_surat ?? old('no_surat') }}" >
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-2">Tanggal</label>
							<div class="col-lg-2">
								<input name="tgl" class="form-control daterange-single" type="text" value="{{ $arsip->tgl_surat ?? old('tgl') }}" >
							</div>
						</div>
                   
					<div class="form-group row {{ !$errors->has('file') ?: 'has-error' }}">
						<label class="col-form-label col-lg-2">File Surat</label>
						<div class="col-md-4">
							<input type="file" name="file_surat">
							<span class="help-block text-danger">{{ $errors->first('file') }}</span>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-form-label col-lg-2">Bagian</label>
						<div class="col-lg-6">
							<select name="direktorat" id="direktorat" class="form-control" onchange="getSubdit(this.value)">
								<option value="" selected disabled>Pilih</option>
								@foreach ($direktorats as $direktorat)
									<option value="{{ $direktorat->id }}">{{ $direktorat->nama_direktorat }}</option>
								@endforeach
							</select>
							{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-2">Subdit</label>
						<div class="col-lg-6">
							<select name="subdit" id="subdit" class="form-control" >
								<option value="" selected disabled>Pilih Subdit</option>
							</select>
							{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
						</div>
					</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-2">Masa Aktif</label>
							<div class="col-lg-2">
								<input name="masa_aktif" class="form-control daterange-single" type="text" value="{{ $arsip->masa_aktif ?? old('masa_aktif') }}" >
							</div>
						</div>
						
					<div class="form-group row">
						<label class="col-form-label col-lg-2">Status Aktif</label>
						<div class="col-lg-3">
							<select name="status" id="status" class="form-control">
								<option value="" selected disabled>Pilih</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
							{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
						</div>
					</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-2">Keterangan</label>
							<div class="col-lg-6">
								<textarea name="ket" id="ket" class="form-control" value="{{ $arsip->ket ?? old('ket') }}"></textarea>
								{{-- <input type="text" name="nama_materi" class="form-control" value="{{ $materi->nama_materi ?? "" }}" > --}}
							</div>
						</div>
						<br>
					<div class="form-group">
						<button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn bg-teal-400">Submit <i class="icon-paperplane ml-2"></i></button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

@stop

@section('script')
		<script>
			$(document).ready(function(){
				var id_kategori = $('#kategori_surat').val();

				if(id_kategori != null || id_kategori != ''){
					getJenis(id_kategori);
				}
				
			});

			CKEDITOR.replace('content_eng');


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

		function getSubdit(idBagian) {
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
