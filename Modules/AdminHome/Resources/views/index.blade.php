@extends('layouts.backend.master')


@section('title', 'Dashboard')
@section('menu', 'Dashboard')
@section('submenu', 'Home')

@section('content')

    <div class="col-md-12">

        <!-- Traffic sources -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Traffic sources</h6>
                <div class="header-elements">
                    <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                        <label class="form-check-label">
                            Live update:
                            <input type="checkbox" class="form-input-switchery" checked="" data-fouc="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: rgb(100, 189, 99) 0px 0px 0px 10px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="card-body py-0">
                <div class="row">
                    
                </div>
            </div>

            <div class="chart mb-2" id="app_sales"><svg width="516.75" height="255"><g transform="translate(50,5)"></g></svg></div>
            <div class="chart" id="monthly-sales-stats"><svg width="516.75" height="100"><g transform="translate(35,20)"></g></svg></div>
        </div>
        <!-- /sales stats -->

    </div>

@stop

@section('script')

@stop
