@extends('layouts.backend.master')


@section('title', 'Blog Kategori')
@section('menu', 'Manage Content Web')
@section('submenu', 'Manage File')
@section('submenu2', 'File Kategori')

@section('content')
<?php use Modules\Menu\Http\Controllers\MenuController;  ?>


<div class="col-md-8 offset-md-2">
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
						<h5 class="card-title"><i class="icon-list2"></i> File Kategori</h5>
						<div class="header-elements">
							<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addFileCategory()"><b><i class="icon-plus3"></i></b> Tambah</button>
	              </div>
					</div>

					<div class="card-body">
						
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Nama Kategori</th>
									<th>Status</th>
									<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
								@foreach($file_categories as $file_category)
									<tr>
										<td>{{$file_category->nama_kategori}}</td>
										<td></td>
										<td class="text-center" style="display: inline-block">
											<button type="button" onclick="getEditUser({{$file_category->id}})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button> 
										
										
								
										  <form method="POST" action="{{ route('file_category.delete', ['id' => $file_category->id]) }}" style="float:left;margin-right: 10px;">
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
                                            {{ $file_categories->links() }}
                                
                                    </td>
                                </tr>
						
							</tbody>
						</table>
					</div>
				</div>
		</div>


		<div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">TAMBAH FILE KATEGORI</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('file_category.store') }}" method="POST" id="formData" class="form-validate-jquery">
						<div class="modal-body">
				
						   	 @csrf
									<div class="form-group">
										<label>Nama Kategori</label>
										<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required placeholder="Nama Kategori">
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
		});


		function addFileCategory(){
			var red = "{{ route('file_category.store') }}";

			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			$('.password-field').show();
			$('.modal-title').text('TAMBAH FILE KATEGORI');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);


		}

		function getEditUser(id){
			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			var url = "{{ route('file_category.edit', ['id' => 'idKategoriEdit']) }}".replace("idKategoriEdit", id);
			var red = "{{ route('file_category.update', ['id' => 'idKategori']) }}".replace("idKategori", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					console.log(response.nama);
					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE FILE KATEGORI')
					$('.btn-action').text('Update')
					$('#nama_kategori').val(response.nama_kategori);

					
				}
			})
		}
	</script>

@stop
