@extends('layouts.backend.master')

@section('title', 'Manage Content Web')
@section('menu', 'Manage Content Web')
@section('submenu', 'Blog Posts')
@section('submenu2', '')

@section('content')
@php
    use Modules\BlogCategory\Entities\BlogCategory;
@endphp
<div class="col-md-12">
    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-newspaper"></i> Blog Post</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<a href="{{ route('cms.blog.create') }}" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</a>
						@endif
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
						<form action="{{ route('cms.blog.search') }}" method="POST">
								@csrf						
								
								@php 
									$cek = Session::has('search_blog');
									$sess_cari = Session::get('search_blog');
								
								@endphp
									<div class="input-group col-md-5">
										<input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Judul" required minlength="3">
										<div class="input-group-append">
											<button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
										</div>
									</div>
	
									
								</form>
								@if($cek)
							<p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata.blog') }}">Hapus Pencarian</a></p>
								
							
								@endif
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
                  <th>No</th>
									<th>Gambar</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Publish</th>
									<th>Created at</th>
									<th>By</th>
									<th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
								@if($blogs->count() > 0)
                @php ($no = 1)
								@foreach($blogs as $blog)
									<tr>
                    <td>{{ $no++ }}</td>
									  <td><img src="{{ asset($blog->file_foto) }}" alt="" width="100" height=70></td>
										<td>{{ $blog->blog_name }}</td>
										<td>{{ BlogCategory::get_category($blog->category) }}</td>
										<td>{{ $blog->publish }}</td>
										<td>{{ $blog->created_at }}</td>
										<td>{{ $blog->create_author }}</td>
										<td class="text-center" style="display: inline-block">
												<a href="{{ route('cms.blog.edit', ['id' => $blog->id]) }}" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></a>     

												<form method="POST" action="{{ route('cms.blog.delete', ['id' => $blog->id]) }}" style="float:left;margin-right: 10px;">
														{!! csrf_field() !!}
														<button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn bg-danger-400 btn-icon rounded-round">
																<i class="icon-trash"></i>
														</button>
										</form>
												
										</td>
									</tr>
								@endforeach
								@else
								<tr>
									<td colspan="8" class="text-center">Tidak ada data</td>
								</tr>
								@endif
								<tr>
									<td  colspan="8">
											{{ $blogs->links() }}
								
									</td>
								</tr> 
							
								
						
							</tbody>

					
						</table>

						
						<br>
					</div>
				</div>
		</div>
@stop

@section('script')
	

@stop
