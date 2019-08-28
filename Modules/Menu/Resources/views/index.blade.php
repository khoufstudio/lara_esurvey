@extends('layouts.backend.master')


@section('title', 'ROLE')
@section('menu', 'Setting')
@section('submenu', 'Menu')
@section('submenu2', '')

@section('content')
<?php use Modules\Menu\Http\Controllers\MenuController;  ?>


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
						<h5 class="card-title"><i class="icon-list2"></i> BACKOFFICE MENUS</h5>
						<div class="header-elements">
							<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button>
	          </div>
					</div>
					<legend></legend>
					<div class="card-body">
						@php
								tree_menu_backend()
						@endphp
					</div>

				
				</div>
		</div>
	</div>


		<div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">TAMBAH MENU</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('menu.store') }}" method="POST" id="formData" class="form-validate-jquery">
						<div class="modal-body">
				
						   	 @csrf
									<div class="form-group">
										<label>Nama menu</label>
										<input type="text" name="nama_menu" id="nama_menu" class="form-control" required placeholder="Nama menu">
									</div>

									<div class="form-group">
										<label class="">Parent </label>
				
											{{-- <select name="parrent" id="parrent" class="form-control" required placeholder="Pilih">
													<option value="" disabled selected>Pilih</option>
													<option value="0">ROOT</option>
	                        @foreach($parrents as $parrent)
															<option value="{{ $parrent->id }}">{{ $parrent->nama_menu }}</option>
	                        @endforeach
	                       
											</select> --}}
											
											<input type="text" name="nama_parrent" id="parrent" readonly class="form-control" onclick="javascript:void window.open('{{ route('menu.list_menu') }}','1431534138220','width=500,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" placeholder="Pilih Menu">
											<input type="hidden" name="parrent" id="id_parrent">
					
									</div>

									<div class="form-group">
										<label>Link</label>
										<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
									</div>
									<div class="form-group">
										<label>Icon Menu <span>  / <a target="_blank" href="https://icomoon.io/#preview-free"> Referensi icon</a></span></label>
										<input type="text" name="icon_menu" id="icon_menu" class="form-control" required placeholder="Icon Menu">
									</div>

									<div class="form-group">
											<label>Urutan</label>
											<input type="number" name="urutan" id="urutan" class="form-control" required placeholder="Urutan Menu">
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

		///treeview

		$.fn.extend({
			treed: function (o) {
				
				var openedClass = 'icon-plus-circle2';
				var closedClass = 'icon-minus-circle2';
			
				// var openedClass = 'icon-minus-circle2';
				// var closedClass = 'icon-plus-circle2';
				
				if (typeof o != 'undefined'){
					if (typeof o.openedClass != 'undefined'){
					openedClass = o.openedClass;
					}
					if (typeof o.closedClass != 'undefined'){
					closedClass = o.closedClass;
					}
				};
				
					//initialize each of the top levels
					var tree = $(this);
					tree.addClass("tree");
					tree.find('li').has("ul").each(function () {
							var branch = $(this); //li with children ul
							branch.prepend("<i class='indicator " + closedClass + "'></i>");
							branch.addClass('branch');
							branch.on('click', function (e) {
									if (this == e.target) {
											var icon = $(this).children('i:first');
											icon.toggleClass(openedClass + " " + closedClass);
											// $(this).children().children().toggle();
									}
							})
							// branch.children().children().toggle();
					});
					//fire event from the dynamically added icon
				// tree.find('.branch .indicator').each(function(){
				// 	$(this).on('click', function () {
				// 			$(this).closest('li').click();
				// 	});
				// });
					//fire event to open branch if the li contains an anchor instead of text
					// tree.find('.branch>a').each(function () {
					// 		$(this).on('click', function (e) {
					// 				$(this).closest('li').click();
					// 				e.preventDefault();
					// 		});
					// });
					//fire event to open branch if the li contains a button instead of text
					// tree.find('.branch>button').each(function () {
					// 		$(this).on('click', function (e) {
					// 				$(this).closest('li').click();
					// 				e.preventDefault();
					// 		});
					// });
			}
		});

		//Initialization of treeviews

		$('#tree1').treed();

		$('#tree2').treed({openedClass:'icon-folder-open', closedClass:'icon-folder'});

		$('#tree3').treed({openedClass:'icon-arrow-right13', closedClass:'icon-arrow-left12'});



		function addUser(){
			var red = "{{ route('menu.store') }}";

			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			$('.password-field').show();
			$('.modal-title').text('TAMBAH MENU');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);


		}

		function getEditMenu(id){
			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			var url = "{{ route('menu.edit', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
			var red = "{{ route('menu.update', ['id' => 'idMenu']) }}".replace("idMenu", id);

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
					$('.modal-title').text('UPDATE MENU')
					$('.btn-action').text('Update')
					$('#nama_menu').val(response.nama_menu);
					$('#id_parrent').val(response.parrent);
					$('#parrent').val(response.nama_parrent);
					$('#link').val(response.link);
					$('#icon_menu').val(response.icon_menu);
					$('#urutan').val(response.urutan);
					
				}
			})
		}

			function deleteMenu(id){
					var tanya = 'Apakah anda yakin?';

					if(confirm(tanya)){
						$('#submitDelete'+id).click();
					}
						
				}
	</script>

@stop
