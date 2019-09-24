@extends('layouts.backend.master')


@section('title', 'Survey Result')
@section('menu', 'Survey Result')
@section('submenu', 'Home')
@section('submenu2', '')

@section('content')
<div class="col-md-12">
  {{-- @dump($role) --}}
  <div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title"><i class="icon-compose"></i> Survey Result</h5>
        <div class="header-elements">
            @if($role['insert'] == "TRUE")
            <a href="{{ route('cms.surveyresult.create') }}"
                class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class"><b><i class="icon-plus3"></i></b> Tambah</a>
            @endif
        </div>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Nama Survey</th>
            <th>Deskripsi</th>
            <th class="text-center" style="width: 200px;"><i class="icon-menu-open2"></i></th>
          </tr>
        </thead>
        <tbody>
          @forelse($pages as $page)
            <tr>
              <td>{{ $page->nama }}</td>
              <td>{{ $page->deskripsi }}</td>
              <td class="text-center">
                <a href="{{ route('cms.surveyresult.download', ['id' => $page->id]) }}" class="btn bg-primary-400 btn-icon rounded-round"><i class="icon-download"></i></a>
                <form method="POST" action="{{ route('cms.surveyresult.delete', ['id' => $page->id]) }}" style="display: inline-block">
                  {!! csrf_field() !!}
                  <button onclick="return confirm('Apakah anda yakin?')" type="submit"
                      class="btn bg-danger-400 btn-icon rounded-round">
                      <i class="icon-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
	          <tr>
	            <td colspan="8" class="text-center">
	              Tidak ada data
	            </td>
	          </tr>
          @endforelse
					
					@if (isset($pages))
	          <tr>
	            <td colspan="8">
	              {{ $pages->links() }}
	            </td>
	          </tr>
					@endif
					
        </tbody>
      </table>
    </div>
  </div>
</div>

@stop

@section('script')
  <script>
      // $(document).on("click", ".button-status-kegiatan", function() {
      //     // remove class if exists
      //     $('.modal-body .circle-status i').removeClass('text-info');

      //     var id = $(this).data('id');
      //     $('.modal-body .circle-status i:lt('+ ((2 + (id * 2)) - 1) +')').addClass('text-info');
      // });

  </script>
@stop
