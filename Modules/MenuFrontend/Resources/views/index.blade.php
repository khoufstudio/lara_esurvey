@extends('layouts.backend.master')


@section('title', 'ROLE')
@section('menu', 'Setting')
@section('submenu', 'Manage Menu Web')
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
						<h5 class="card-title"><i class="icon-list2"></i> FRONTEND MENUS</h5>
						<div class="header-elements">
							<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-plus3"></i></b> Tambah</button>
							
	              </div>
					</div>
					<legend></legend>
					

				
						


						@php
							tree_menu();
						@endphp


						
					
				</div>

		</div>




	{{-- modal tambah --}}
		<div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h6 class="modal-title">TAMBAH MENU</h6>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>

					<form action="{{ route('cms.frontendmenus.store') }}" method="POST" id="formData" class="form-validate-jquery">
						<div class="modal-body">
				
						   	 @csrf
									<div class="form-group">
										<label>Nama menu</label>
										<input type="text" name="nama_menu" id="nama_menu" class="form-control" required placeholder="Nama menu">
									</div>

									<div class="form-group">
										<label class="">Parent </label>
				
											
												<input type="text" name="nama_parrent" id="parrent" readonly class="form-control" onclick="javascript:void window.open('{{ route('cms.list_menu_frontend') }}','1431534138220','width=500,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" placeholder="Pilih Menu">
												<input type="hidden" name="parrent" id="id_parrent">
	                       
	                    
					
									</div>

									{{-- <div class="form-group">
										<label>Link</label>
										<input type="text" name="link" id="link" class="form-control" required placeholder="Link">
									</div> --}}
									<div class="form-group">
										<label>Urutan</label>
										<input type="number" name="urutan" id="urutan" class="form-control" required placeholder="Urutan">
									</div>
									


								
		           
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn bg-info btn-action" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
					</div>
				</form>
			</form>
				</div>
			</div>
		</div>

		{{-- end modal tambah --}}


		
		<!-- modal setting link-->
		<div id="modal_settinglink" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content" style="">
					<div class="modal-header">
						<h5 class="modal-title"><i class="icon-link mr-2"></i> &nbsp;Setting Link</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
				<form id="formSettingLink" method="POST" class="form-validate-jquery">
					@csrf
						<div class="modal-body">
								<div class="alert alert-info alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
											Anda bisa mengarahkan link Menu <span id="titleMenu" class="font-weight-semibold"></span> berdasarkan kategori
											<button type="button" class="close" data-dismiss="alert">×</button>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Kategori</label>
										<div class="col-lg-9">
											<div class="btn-group">
												<button type="button" class="btn bg-pink-400 btn-labeled btn-labeled-left dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><b><i class="icon-menu2"></i></b><span id="titleKategori"> Pilih Kategori</span></button>
												<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(142px, 36px, 0px);">
										
										
													<p onclick="openLink('{{ route('cms.frontendmenus.topages') }}','Halaman Web','700','500', '1')" class="dropdown-item"><i class="icon-stack"></i> Halaman Web</p>
													<p onclick="openLink('{{ route('cms.frontendmenus.to_blogcategories') }}','Blog Kategori','700','500', '2')" class="dropdown-item"><i class="icon-three-bars"></i> Blog Kategori</p>
													<p onclick="openLink('{{ route('cms.frontendmenus.to_blogcategories') }}','Link External','700','500', '4')"  class="dropdown-item"><i class="icon-link"></i> Link External</p>
												
													{{-- <p onclick="openLink('{{ route('cms.frontendmenus.to_blogcategories') }}','Blog Kategori','700','500', '3')"  class="dropdown-item"><i class="icon-file-picture2"></i> Other</p> --}}
													<div class="dropdown-divider"></div>
													<div class="dropdown-submenu">
															<a href="#" class="dropdown-item dropdown-toggle">Ragam</a>
															<div class="dropdown-menu">
																<p onclick="openLink('','File Kategori','700','500', '31')"  class="dropdown-item">File Kategori</p>
																<p onclick="openLink('','Photo Album','700','500', '32')"  class="dropdown-item">Photo Album</p>
																<p onclick="openLink('','Video','700','500', '33')"  class="dropdown-item">Video</p>
														
																{{-- <a href="#" class="dropdown-item"></a> --}}
															</div>
														</div>
											
												</div>
											</div>
										</div>
									</div>

									<div class="form-group row">
											<label class="col-lg-3 col-form-label">Arahkan Link Menu Ke</label>
											<div class="col-lg-6">
											
													<input type="hidden" name="id_kategori" id="id_kategori" required>
													<input type="text" id="name_link1" onkeyup="getValue(this.value)" class="form-control" disabled required>
													<input type="hidden" name="link" id="link" required>
													<input type="hidden" name="name_link" id="name_link2">
										
											</div>
											</div>
									
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
						<button onclick="event.preventDefault();document.getElementById('formSettingLink').submit();" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Save</button>

						
					</div>

				</form>
				</div>
			</div>
		</div>
		<!-- /moodal setting link -->
	</div>
@stop

@section('script')
	<script>
		$(document).ready(function(){
	     $(".btn-class").click(function(){
	         console.log('test')
	     });

			 
		});



		function getValue(valuee){
			 $("#link").val(valuee);
			 $("#name_link2").val(valuee);

		}

		function addUser(){
			var red = "{{ route('cms.frontendmenus.store') }}";

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
			var url = "{{ route('cms.frontendmenus.edit', ['id' => 'idMenuEdit']) }}".replace("idMenuEdit", id);
			var red = "{{ route('cms.frontendmenus.update', ['id' => 'idMenu']) }}".replace("idMenu", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){

					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE MENU')
					$('.btn-action').text('Update')

					$('#nama_menu').val(response.nama_menu);
					$('#parrent').val(response.nama_parrent);
					$('#id_parrent').val(response.parrent);
					$('#link').val(response.link);
					$('#urutan').val(response.urutan);
					
				}
			})
		}



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

		function deleteMenu(id){
			var tanya = 'Apakah anda yakin?';

			if(confirm(tanya)){
				$('#submitDelete'+id).click();
			}
				
		}


		function settingLink(idMenu){
			$('#modal_settinglink').modal('show');
			var url = "{{ route('cms.frontendmenus.setting_link', ['id' => 'idMenuSet']) }}".replace("idMenuSet", idMenu);
			var urlUpdate = "{{ route('cms.frontendmenus.setting_link.save', ['id' => 'idMenuSetUp']) }}".replace("idMenuSetUp", idMenu);

			$('#formSettingLink').attr('action', urlUpdate);

			
			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					var categ = '';
					if(response.kategori == 2){
						categ = 'Blog Kategori';
					}else if(response.kategori == 1){
						categ = 'Halaman Web';
					}else if(response.kategori == 4){
						categ = 'Link External';
					}else if(response.kategori == 31 || response.kategori == 32 || response.kategori == 33){
						categ = 'Ragam';
					}else{
						categ = 'Pilih Kategori';
					}
					$('#titleMenu').text(response.nama_menu);
					$('#titleKategori').text(categ);
					$('#name_link1').val(response.nama_link);
					$('#link').val(response.link);
				

				
					
				}
			})

		}


		function openLink(url, title, w, h, jenis){
			$('#titleKategori').text(title);
			$('#id_kategori').val(jenis);

			if(jenis == '4'){
				$('#name_link1').removeAttr('disabled');
				$('#name_link1').attr('placeholder', 'Masukan Link External');
				$('#name_link1').focus();
			}else if(jenis == '31'){
					$('#titleKategori').text('Ragam');
					$('#name_link1').val('File Kategori');
					$('#name_link2').val('File Kategori');
					$('#link').val('filekategori');
					$('#id_kategori').val('31');
			}else if(jenis == '32'){
					$('#titleKategori').text('Ragam');
					$('#name_link1').val('Photo Album');
					$('#name_link2').val('Photo Album');
					$('#link').val('photoalbum');
					$('#id_kategori').val('32');
			}else if(jenis == '33'){
					$('#titleKategori').text('Ragam');
					$('#name_link1').val('Video');
					$('#name_link2').val('Video');
					$('#link').val('vide');
					$('#id_kategori').val('33');
			}else{
				$('#name_link1').attr('disabled', 'disabled');
				$('#name_link1').removeAttr('placeholder');
				if(jenis == '1'){
					title = 'Halaman Web';
				}else if(jenis == '2'){
					title = 'Blog Kategori';
				}else if(jenis == '3'){
					title = 'File Kategori';
				}else{
					title = 'Link External';
				}
			
				
				// Fixes dual-screen position                         Most browsers      Firefox
				var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
				var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

				var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
				var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

				var systemZoom = width / window.screen.availWidth;
				var left = (width - w) / 2 / systemZoom + dualScreenLeft
				var top = (height - h) / 2 / systemZoom + dualScreenTop
				var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

						// Puts focus on the newWindow
						if (window.focus) newWindow.focus();
			}
	}

	</script>

@stop
