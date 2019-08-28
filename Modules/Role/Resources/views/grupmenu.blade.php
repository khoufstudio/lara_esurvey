@extends('layouts.backend.master')


@section('title', 'Berita')
@section('menu', 'Setting')
@section('submenu', 'Role')
@section('submenu2', 'Group Menu')
<?php use Modules\Menu\Http\Controllers\MenuController;  ?>

@section('content')
	<div class="col-md-12">
    <div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title"><i class="icon-menu2"></i> Group Menu</h5>
					<div class="header-elements">
						{{-- <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button> --}}
						
						{{-- <div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	                		<a class="list-icons-item" data-action="remove"></a>
	                	</div> --}}
              </div>
				</div>

				<div class="card-body">
						<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead class="bg-slate-600">
										<tr>
											<th rowspan="2" style="vertical-align:middle;text-align:center">Menu</th>
											<th colspan="4" style="text-align:center">Previlege</th>		
										</tr>
			
											<tr class="">
												<th class="text-center">Insert</th>
												<th class="text-center">Read / Detail</th>
												<th class="text-center">Update</th>
												<th class="text-center">Delete</th>																
											</tr>
									</thead>
			
									<tbody>
			
										 @foreach($menus as $menu)
										 <?php $checked = ''; ?>
										 <?php $role = ''; ?>
											 @foreach($grupmenus as $grupmenu)
												@if($menu->id == $grupmenu->id_menu)
														<?php 
															$checked = 'checked'; 
															$role = decode_role($grupmenu->role);	
														?>
												@endif
											 @endforeach
											
											 <tr>
														<td>
															<input type="checkbox" name="role[{{ $menu->id }}]" value="ROOT" {{ $checked }} id="ceklistROOT-{{ $menu->id }}"  onclick="checkList(this.value, '<?php echo $menu->id; ?>')">
															@if($menu->parrent == 0)
																<b class="ml-2" style="color: blue">{{ $menu->nama_menu }}</b>
			
															 @else
																 <span class="ml-3"> {!! $menu->nama_menu !!} </span>
															@endif
														</td>
														
															
														<td class="text-center">
														<input type="checkbox" name="role[{{ $menu->id }}]" id="ceklistC-{{ $menu->id }}" value="C"   
															<?php echo (isset($role["insert"]) && $role["insert"] =="TRUE") ? 'checked="" ' : '' ; ?> onclick="checkList(this.value, '<?php echo $menu->id; ?>')">
														</td>
														
														<td class="text-center">
															<input type="checkbox" name="role[{{ $menu->id }}]" id="ceklistR-{{ $menu->id }}" value="R"   
															<?php echo (isset($role["read"]) && $role["read"] =="TRUE") ? 'checked="" ' : '' ; ?> onclick="checkList(this.value, '<?php echo $menu->id; ?>')">
														</td>
														
														<td class="text-center">
															<input type="checkbox" name="role[{{ $menu->id }}]" id="ceklistU-{{ $menu->id }}" value="U" 
															<?php echo (isset($role["update"]) && $role["update"] =="TRUE") ? 'checked="" ' : '' ; ?> onclick="checkList(this.value, '<?php echo $menu->id; ?>')">
														 
														</td>
														<td class="text-center">
															<input type="checkbox" name="role[{{ $menu->id }}]" id="ceklistD-{{ $menu->id }}" value="D"  
															<?php echo (isset($role["delete"]) && $role["delete"] =="TRUE") ? 'checked="" ' : '' ; ?> onclick="checkList(this.value, '<?php echo $menu->id; ?>')">
														</td>
										
												<!-- </div> -->
										 
											</tr>
										@endforeach
										
			
									</tbody>
								</table>
							</div>
				</div>

			
			</div>
	</div>


			{{-- {{ get_role(Auth::user()->id_user_group)['delete'] }} --}}
			



@stop

@section('script')
<script>
		$(document).ready(function(){
			
		});
	
		function checkList(action, id){
			
				var idUserGroup = {{ Request::segment(4) }};
				var url = "{{ route('role.updategrupmenu', ['id' => 'idMenu']) }}".replace("idMenu", idUserGroup);
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        if($('#ceklist'+action+'-'+id).is(':checked')){
					var cek = 'true';
					console.log(CSRF_TOKEN);
					var cek = 'true';
					   $.ajax({
            	url: url,
							method: 'POST',
							data: { _token: CSRF_TOKEN, cek: cek, action : action, id_menu: id },
							dataType: 'JSON',
            	success: function(obj){
            		// if(obj == 'true'){
            		// 	// $('.status').html('<p id="verified" class="fa fa-check" style="color: green;"> Verified</p>');
								// }
								
								console.log(CSRF_TOKEN);
            	},
            	error: function(jqXHR, textStatus, errorTrown){

            	}
						});
				}else{
					var cek = 'false';
					$.ajax({
            	url: url,
							method: 'POST',
							data: { _token: CSRF_TOKEN, cek: cek, action : action, id_menu: id },
							dataType: 'JSON',
            	success: function(obj){
            		// if(obj == 'true'){
            		// 	// $('.status').html('<p id="verified" class="fa fa-check" style="color: green;"> Verified</p>');
								// }
								
								console.log(CSRF_TOKEN);
            	},
            	error: function(jqXHR, textStatus, errorTrown){

            	}
						});
					console.log(cek)
				}
         
			
           
						
						
	}	

		
	</script>

@stop
