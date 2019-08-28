@extends('layouts.backend.master')


@section('title', 'User Responden')
@section('menu', 'User Responden')
@section('submenu', $condition = (isset($editpage)) ? 'Edit' : 'Tambah')
@section('submenu2', '')

@section('content')
<div class="col-md-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-newspaper"></i> {{ $condition }} User Responden</h5>
        </div>

        <div class="card-body">
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
                    {{-- Nama User Responden --}}
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Nama User Responden</label>
                        <div class="col-lg-10">
                            <input type="text" name="nama_survey" class="form-control" value="{{ $data->nama_survey ?? "" }}" placeholder="Nama User Responden">
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group row">
                      <label class="col-form-label col-lg-2">Deskripsi</label>
                      <div class="col-lg-10">
                        <textarea rows="3" cols="3" class="form-control" placeholder="Deskripsi" name="deskripsi">{{ $data->deskripsi ?? "" }}</textarea>
                      </div>
                    </div>

                    {{-- Status --}}
                    <div class="form-group row">
                      <label class="col-form-label col-lg-2">Status</label>
                      <div class="col-lg-10">
                          <select class="form-control form-control-uniform" data-fouc="" name="status">
                              <option value="0" {{ (($data->status ?? "") == 0) ? 'selected' : '' }}>Public</option>
                              <option value="1" {{ (($data->status ?? "") == 1) ? 'selected' : '' }}>Private</option>
                            </select>
                      </div>
                    </div>

                    <div class="form-group mt-5">
                        <button name="button_submit" type="submit" onclick="return confirm('Apakah anda yakin?')"
                            class="btn bg-teal-400 mr-3" value="0">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@stop



@section('script')
<script>
    $(document).ready(function(){

    });

    $('.form-control-uniform-custom').uniform({
        fileButtonClass: 'action btn bg-blue',
        selectClass: 'uniform-select bg-pink-400 border-pink-400'
    })

</script>
@stop
