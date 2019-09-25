@extends('layouts.backend.master')


@section('title', 'Dashboard')
@section('menu', 'Dashboard')
@section('submenu', 'Home')

@section('content')

<div class="col-md-6">
	<div class="card text-center">
		<div class="card-body">
			<i class="icon-clipboard3 icon-2x text-success border-success border-2 rounded-round p-2 mb-2"></i>
			<h1 class="card-title">{{ $data['survey_total']}} </h1>
			<p class="mb-3 text-secondary">Total Survey</p>
			<a href="survey" class="btn bg-success">Lihat Modul Survey <i class="icon-arrow-right14 ml-2"></i></a>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card text-center">
		<div class="card-body">
			<i class="icon-clipboard2 icon-2x text-primary border-primary border-2 rounded-round p-2 mb-2"></i>
			<h1 class="card-title">{{ $data['survey_result_total']}}</h1>
			<p class="mb-3 text-secondary">Total Data Survey Terisi</p>
			<a href="surveyresult" class="btn bg-primary">Lihat Modul Survey Result<i class="icon-arrow-right14 ml-2"></i></a>
		</div>
	</div>
</div>

@stop

@section('script')

@stop
