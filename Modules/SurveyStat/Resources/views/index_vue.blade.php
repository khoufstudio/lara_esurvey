@extends('layouts.backend.master')


@section('title', 'Survey Statistik')
@section('menu', 'Survey Statistik')
@section('submenu', 'Home')
@section('submenu2', '')

@section('content')
  <div id="app" class="col-md-12">
    <statistik></statistik>
  </div>

  <div class="card-deck col-md-12" id="container_filter">
    
  </div>

  {{-- <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-white header-elements-inline">
        <h5 class="card-title">Apakah Anda Tinggal Di Jabodetabek</h5>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <canvas id="myChart1" width="400" height="400"></canvas>
        </div>
      </div>
    </div>
  </div> --}}


  {{-- <script type="text/javascript" src="{!! file_get_contents(Module::find('SurveyStat')->getPath() . '/Resources/assets/js/app.js'); !!}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('js/app.s') }}"></script> --}}

@stop

@section('script')
	<script>
		{!! file_get_contents(Module::find('SurveyStat')->getPath() . '/Resources/assets/js/app.js'); !!}		
	</script>
@stop
