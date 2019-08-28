@extends('layouts.backend.master')
@section('title', 'Users')
@section('menu', 'Setting')
@section('submenu', 'Users')

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
        <h5 class="card-title"><i class="icon-people"></i> USERS</h5>
        <div class="header-elements">
          <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-user-plus"></i></b> Tambah</button>
          
          {{-- <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                  </div> --}}
            </div>
      </div>
        <div class="card-body">
          <form action="{{ route('user.post') }}" method="POST">
            @csrf						
            @php 
              $cek = Session::has('search_user');
              $sess_cari = Session::get('search_user');
            @endphp
            <div class="input-group col-md-5">
              <input type="text" name="search" value="@if($cek) {{$sess_cari}} @endif" class="form-control" placeholder="Masukan Keyword, Nama/Username" required minlength="3">
              <div class="input-group-append">
                <button type="submit" class="btn bg-blue"> <i class="icon-search4"></i> Cari</button>									
              </div>
            </div>
          </form>
          @if($cek)
            <p class="mt-2 ml-2">Pencarian data berdasarkan keyword <strong style="color:red">{{ $sess_cari }}</strong> | <a href="{{ route('cleardata') }}">Hapus Pencarian</a></p>
          @endif
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Username</th>
                <th>Handphone</th>
                <th>User Group</th>
                <th>Created at</th>
                <th>Status</th>
                <th class="text-center" style="width: 123px;"><i class="icon-menu-open2"></i></th>
              </tr>
            </thead>
            <tbody>
              {{-- @dd($users->all()) --}}
              @if($users->count() > 0)
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->hp}}</td>
                    <td>{{$user->roles->nama_user_group}}</td>
                    {{-- <td>{{$user->nama_user_group}}</td> --}}
                    <td>{{$user->created_at}}</td>
                    <td>
                      @if($user->status == 1)
                      Aktif
                      @else
                      Tidak Aktif
                      @endif
                    </td>
                    <td class="text-center" style="display: inline-block">
                      <button type="button" onclick="getEditUser({{$user->id}})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button> 
                      <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}" style="float:left;margin-right: 10px;">
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
                  {{ $users->links() }}
                </td>
              </tr>
            </tbody>
          </table>
          <br>
        </div>
    </div>
  </div>
  
  <div id="modal_theme_info" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h6 class="modal-title">TAMBAH USER</h6>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <form action="{{ route('user.store') }}" method="POST" id="formData" class="form-validate-jquery">
          <div class="modal-body">
            @csrf
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="name" id="name" class="form-control" required placeholder="Nama Lengkap">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" id="email" required placeholder="Email">
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" id="username" class="form-control" required placeholder="Username">
            </div>

            <div class="form-group">
              <label>Handphone</label>
              <input type="text" name="hp" id="hp" class="form-control" required placeholder="Hp">
            </div>

            <div class="form-group">
              <label class="">User Group </label>
              <select name="id_user_group" id="id_user_group" class="form-control" required placeholder="Pilih">
                <option value="" disabled selected>Pilih</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nama_user_group }}</option>
                @endforeach
              </select>
            </div>

            <div class="password-field">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" id="password_re" name="repeat_password" class="form-control" required placeholder="Ulangi Password">
              </div>
            </div>

            <div class="form-group">
              <label class="">Status </label>
              <select name="status" id="status" class="form-control" required placeholder="Pilih">
                <option value="" disabled selected>Pilih</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>    
              </select>
            </div>

            {{-- <div class="form-group">
              <label class="">Admin Litbang</label>
              <div class="form-control">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="adminlitbank" id="custom_radio_inline_checked">
                  <label class="custom-control-label" for="custom_radio_inline_checked">Ya</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" name="adminlitbank" id="custom_radio_inline_unchecked" checked="">
                  <label class="custom-control-label" for="custom_radio_inline_unchecked">Tidak</label>
                </div>
              </div>
            </div> --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-info btn-action" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
          </div>
      </form>
      </div>
    </div>
  </div>
@stop

@section('script')
	<script>
		$(document).ready(function(){
      $(".btn-class").click(function(){
        console.log('test')
      });
    });
    
		function addUser() {
			var red = "{{ route('user.store') }}";

			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');
			$('.password-field').show();
			$('.modal-title').text('TAMBAH USER');
			$('.btn-action').text('Simpan');
			
			$('#formData').removeAttr('action');
			$('#formData').attr('action', red);


		}

		function getEditUser(id) {
			$('form').trigger('reset');
			$('#modal_theme_info').modal('show');

			var url = "{{ route('user.edit', ['id' => 'idUserEdit']) }}".replace('idUserEdit', id);;
			var red = "{{ route('user.update', ['id' => 'idUser']) }}".replace("idUser", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					console.log(response.name);
					$('.password-field').hide();
					$('#password').removeAttr('required');
					$('#password_re').removeAttr('required');
					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE USER')
					$('.btn-action').text('Update')
					$('#name').val(response.name);
					$('#email').val(response.email);
					$('#username').val(response.username);
					$('#hp').val(response.hp);
					$('#status').val(response.status);
					$('#id_user_group').val(response.id_user_group);
				}
			})
		}
	</script>

@stop
