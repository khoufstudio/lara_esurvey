@extends('layouts.backend.global_template')

@section('title', 'Forbidden Access!')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content d-flex justify-content-center align-items-center">

    <!-- Container -->
    <div class="flex-fill">

      <!-- Error title -->
      <div class="text-center mb-3">
        <h1 class="error-title">403</h1>
        <h5>Oops, an error has occurred. Forbidden!</h5>
      </div>
      <!-- /error title -->

      <!-- Error content -->
      <div class="row">
        <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">

          <!-- Search -->
          <form action="#">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i class="icon-search4"></i></button>
              </div>
            </div>
          </form>
          <!-- /search -->


      
          
        </div>
      </div>
      <!-- /error wrapper -->

    </div>
  </div>
</div>
    <!-- /container -->
@stop