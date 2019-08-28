@extends('layouts.backend.master')


@section('title', 'Developer')
@section('menu', 'Developer')
@section('submenu', 'Passport')
@section('submenu2', '')


@section('content')
<div class="col-md-8  offset-md-2 mb-5">
  <div id="app">

    <div class="card" style="padding: 10px">
        <div class="card-header header-elements-inline">
          <h5 class="card-title"><i class="icon-key"></i> Akses Token</h5>
          <div class="header-elements"></div>
          
              
        </div>
        
        <div class="card-body">
          
        </div>
        
        <router-view></router-view>
      </div>
      
    </div>


</div>



@stop


