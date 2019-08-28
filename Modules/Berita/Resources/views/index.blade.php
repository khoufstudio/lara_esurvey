@extends('layouts.backend.master')

@section('title', 'CMS WEB')
@section('menu', 'CMS WEB')
@section('submenu', 'Berita')
@section('submenu2', '')

@section('content')
<div class="col-md-12">
    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><i class="icon-newspaper"></i> Manage Berita</h5>
						<div class="header-elements">

						@if($role['insert'] == "TRUE")
							<a href="{{ route('berita.create') }}" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b>Tambah</a>
						@endif
							{{-- <div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div> --}}
	              </div>
					</div>

					<div class="card-body">
						
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Gambar</th>
									<th>Judul</th>
									<th>Isi Berita</th>
									<th>Created at</th>
									<th>Status</th>
									<th class="text-center" style="width: 120px;"><i class="icon-menu-open2"></i></th>
								</tr>
							</thead>
							<tbody>
								@foreach($beritas as $berita)
									<tr>
									<td><img src="{{ asset($berita->image) }}" alt="" width="100"></td>
										<td>{{$berita->title}}</td>
										<td>{{ substr($berita->description, 50, 200) }}</td>
										
										<td>{{$berita->created_at}}</td>
										<td>active</td>
							
										<td class="text-center">
										
										<a href="{{ route('berita.edit', ['id' => $berita->id]) }}" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></a> 
										
											<p></p>
								
										  <form method="POST" action="{{ route('berita.delete', ['id' => $berita->id]) }}">
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
											{{ $beritas->links() }}
								
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
