@extends('layouts.backend.master')


@section('title', 'CMS WEB')
@section('menu', 'CMS WEB')
@section('submenu', 'Berita')
@section('submenu2', 'Create News')


@section('content')
<div class="col-md-12">
    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-newspaper"></i> Tambah Berita</h5>
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
													<input type="text" name="title" class="form-control" value="{{ $berita->title ?? "" }}">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Description</label>
												<div class="col-lg-10">
														<textarea name="description" id="editor-full" rows="4" cols="4">{{ $berita->description ?? "" }}</textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-form-label col-lg-2">Image</label>
												<div class="col-lg-4">
													<input type="file" name="image" class="form-control">
												</div>
												<br>
											
											</div>

											<div>
													<div class="form-group row">
															<label class="col-form-label col-lg-2"></label>
															<div class="col-lg-4">
																	<img src="{{ asset($berita->image) }}" style="width: 200px;height:150px">
															</div>
														
														
														</div>
											
											</div>

											<div class="form-group">
													<button type="submit" class="btn bg-teal-400">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
			
									</fieldset>
							</form>
					</div>
				</div>
		</div>

@stop



@section('script')

@stop