@extends('layouts.backend.master')


@section('title', 'ROLE')
@section('menu', 'Setting')
@section('submenu', 'Role')
@section('submenu2', '')


@section('content')
<div class="col-md-6 offset-md-3">
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
						<h5 class="card-title"><i class="icon-accessibility"></i> ROLE</h5>
						<div class="header-elements">
							<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button>
							
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
							<form action="{{ route('role.post') }}" method="POST">
									@csrf						
									
									@php 
										$cek = Session::has('search_role');
										$sess_cari = Session::get('search_role');
									
									@endphp
										<div class="input-group col-md-7">
											<input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Nama User Group" required minlength="3">
											<div class="input-group-append">
												<button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
											</div>
										</div>
			
										
									</form>
									@if($cek)
								<p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata.role') }}">Hapus Pencarian</a></p>
			
									@endif
								
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Nama Role</th>
									<th>Created at</th>
								
									<th class="text-center" style="width: 165px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
								@if($roles->count() > 0)
								@foreach($roles as $role)
									<tr>
										<td>{{$role->nama_user_group}}</td>
										<td>{{$role->created_at}}</td>
								
										{{-- <td class="text-center">
											<button type="button" onclick="getEditUser({{$role->id}})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button> 
					
								
										  <form method="POST" action="{{ route('role.delete', ['id' => $role->id]) }}" >
				                {!! csrf_field() !!}
				                <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn bg-danger-400 btn-icon rounded-round">
				                    <i class="icon-trash"></i>
				                </button>
				              </form>

				              <a href="{{ route('grupmenu.index', ['id' => $role->id]) }}" class="btn bg-info-400 btn-icon rounded-round"><i class="icon-equalizer"></i></a> 
											
										</td> --}}

										<td class="text-center" style="display: inline-block">
												<button type="button" onclick="getEditUser({{$role->id}})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button> 
											
											
									
												<form method="POST" action="{{ route('role.delete', ['id' => $role->id]) }}" style="float:left;margin-right: 5px;">
																{!! csrf_field() !!}
																<button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn bg-danger-400 btn-icon rounded-round">
																		<i class="icon-trash"></i>
																</button>
												</form>

												<a href="{{ route('grupmenu.index', ['id' => $role->id]) }}" class="btn bg-info-400 btn-icon rounded-round"><i class="icon-equalizer"></i></a>
												
										</td>
									</tr>
								@endforeach
								@else
								<tr>
									<td colspan="3" class="text-center">Tidak ada data</td>
								</tr>
								@endif
								
								<tr>
										<td  colspan="4">
												{{ $roles->links() }}
									
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
						<h6 class="modal-title">TAMBAH USER</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('role.store') }}" method="POST" id="formData" class="form-validate-jquery">
						<div class="modal-body">
				
						   	 @csrf
									<div class="form-group">
										<label>Nama User Grup</label>
										<input type="text" name="nama_user_group" id="nama_user_group" class="form-control" required placeholder="Nama User Group">
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



		function addUser(){
			var red = "{{ route('role.store') }}";

			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			$('.password-field').show();
			$('.modal-title').text('TAMBAH USER GRUP');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);


		}

		function getEditUser(id){
			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			var url = "{{ route('role.edit', ['id' => 'idRoleEdit']) }}".replace("idRoleEdit", id);
			var red = "{{ route('role.update', ['id' => 'idRole']) }}".replace("idRole", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					console.log(response.name);
					$('.password-field').hide();
					$('#password').removeAttr('required');
					$('#password_re').removeAttr('required');
					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE USER GRUP')
					$('.btn-action').text('Update')
					$('#nama_user_group').val(response.nama_user_group);
					
				}
			})
		}
	</script>

@stop
