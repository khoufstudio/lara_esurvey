@extends('layouts.backend.master')


@section('title', 'Manage Content Web')
@section('menu', 'Manage Content Web')
@section('submenu', 'Blog Posts')
@section('submenu2', 'Create Post')

@php
		$uri = Request::segment(4);
@endphp

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
						<h5 class="card-title"><i class="icon-newspaper"></i> Tambah Post</h5>
						<div class="header-elements">
							
							
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
					<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
									@csrf

									<fieldset class="mb-3">
											<legend class="text-uppercase font-size-sm font-weight-bold"></legend>
			
											<div class="form-group row">
												<label class="col-form-label col-lg-2">Title</label>
												<div class="col-lg-10">
													<input type="text" name="title" class="form-control" value="{{ $blog->blog_name ?? old('title') }}">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Kategori</label>
												<div class="col-lg-10">
													{{-- <input type="text" name="title" class="form-control" value="{{ $blog->blog_name ?? "" }}"> --}}
													<select name="category" class="form-control" id="category" required autocomplete="category" autofocus>
														<option value="" selected disabled>-- Pilih --</option>
														@foreach ($categories as $category)
															<option value="{{ $category->id }}" @if($uri != 'create') @if($category->id == $blog->category) selected @endif @endif> {{ $category->nama	 }}</option>		
														@endforeach
													</select>
												</div>
											</div>

							

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Images & Files Library</label>
												<div class="col-lg-10">
														<div class="controls">
																Anda bisa menyisipkan lebih banyak gambar atau link files ke dalam teks editor &gt;&gt;	
														<button class="btn btn-success btn-sm" onclick="javascript:void window.open('{{ route('cms.imagelibraries') }}','1431534138220','width=1024,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">
																<i class="icon-images3"> Koleksi Gambar</i>
															</button>
				
																<button class="btn btn-info btn-sm" onclick="javascript:void window.open('{{ route('cms.filelibraries') }}','1431534138220','width=1024,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">
																<i class="icon-files-empty2"> Koleksi File</i>
																</button>												
															</div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Content</label>
												<div class="col-lg-10">
														<textarea name="content" id="editor-full" rows="4" cols="4">{{ $blog->blog_desc ?? old('content') }}</textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Content English</label>
												<div class="col-lg-10">
														<textarea name="content_eng" id="" rows="4" cols="4">{{ $blog->blog_desc_eng ?? old('content_eng') }}</textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Image</label>
												<div class="col-lg-4">
													<input type="file" name="image" class="form-control">
												</div>
			
											
											</div>

											<div>
												<div class="form-group row">
														<label class="col-form-label col-lg-2"></label>
														<div class="col-lg-4">
															@if(File::exists($blog->file_foto ?? ""))
																<img src="{{ asset($blog->file_foto) }}" style="width: 200px;height:150px">
															@endif
																
														</div>
													
													
													</div>
										
										</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Publish</label>
												<div class="col-lg-2">
													<select name="publish" id="" class="form-control">
														<option value="" selected disabled> -- Pilih --</option>
														<option value="Y" @if($uri != 'create')  @if($blog->publish == 'Y') selected @endif @endif>Y</option>
														<option value="N" @if($uri != 'create')  @if($blog->publish == 'N') selected @endif @endif>N</option>
													</select>
												</div>
												<br>
											
											</div>

											<div>
													<div class="form-group row">
															<label class="col-form-label col-lg-2"></label>
															<div class="col-lg-4">
																	{{-- <img src="" style="width: 200px;height:150px"> --}}
															</div>
														
														
														</div>
											
											</div>

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
				$('#category').select2({
					placeholder: {
						id: '',
						text: 'Select Option'
					}
				});
			});
			
			CKEDITOR.replace('content_eng');
		</script>
@stop