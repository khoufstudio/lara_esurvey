@extends('layouts.backend.library_template')

@section('title', 'Halaman Web')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content d-flex justify-content-center align-items-center">

    <!-- Container -->
    <div class="flex-fill">


      <div class="row">
        <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"> <i class="icon-stack"></i> Halaman Web</h5>
                
              </div>
              <legend></legend>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Halaman</th>
                      <th>Created at</th>
                      <th> <i class="icon-chevron-down"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no =1;
                    @endphp
                    @foreach ($pages as $page)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $page->pages_name }}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="getIdKategori('{{ $page->id }}', '{{ $page->pages_name }}')">Pilih</button>
                        </td>
                      
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                
                

              </div>

            </div>
              <div class="card-footer">
                  {{ $pages->links() }}
              </div>
          
        </div>
      </div>
      </div>
      <!-- /error wrapper -->

    </div>
  </div>
</div>
    <!-- /container -->
@stop


@section('script')
  <script>
    function getIdKategori(id, name){
      window.opener.document.getElementById('link').value = id;
      window.opener.document.getElementById('name_link1').value = name;
      window.opener.document.getElementById('name_link2').value = name;
		  window.close();
    }
  </script>
@stop