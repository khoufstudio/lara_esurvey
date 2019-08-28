@extends('layouts.backend.master')


@section('title', 'User Responden')
@section('menu', 'User Responden')
@section('submenu', 'Home')
@section('submenu2', '')

@section('content')
<div class="col-md-12">
  <div class="card">
      <div class="card-header header-elements-inline">
        <h5 class="card-title"><i class="icon-users"></i> User Responden</h5>
        <div class="header-elements">
          @if($role['insert'] == "TRUE")
            <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round btn-class" onclick="addUser()"><b><i class="icon-user-plus"></i></b> Tambah</button>
          @endif
        </div>
      </div>
      <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Peniliti</th>
                <th class="text-center" style="width: 200px;"><i class="icon-menu-open2"></i></th>
              </tr>
            </thead>
            <tbody>
              @foreach($pages as $page)
              <tr>
                <td>{{ $page->nama }}</td>
                <td>{{ $page->username }}</td>
                <td>{{ $page->peneliti->name }}</td>
                <td class="text-center">
                    {{-- <a href="{{ route('cms.responden.edit', ['id' => $page->id]) }}" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></a> --}}
                    <button type="button" onclick="getEditUser({{$page->id}})" class="btn bg-success-400 btn-icon rounded-round"><i class="icon-pencil7"></i></button> 

                    <form method="POST" action="{{ route('cms.responden.delete', ['id' => $page->id]) }}"
                          style="display: inline-block">
                        {!! csrf_field() !!}
                        <button onclick="return confirm('Apakah anda yakin?')" type="submit"
                            class="btn bg-danger-400 btn-icon rounded-round">
                            <i class="icon-trash"></i>
                        </button>
                    </form>

                </td>
              </tr>
              @endforeach
              <tr>
                  <td colspan="8">
                      {{ $pages->links() }}
                  </td>
              </tr>
            </tbody>
          </table>
      </div>
  </div>
</div>

{{-- Modal Add dan Edit User --}}
<div id="modal_tambah_user" class="modal fade"  tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <h6 class="modal-title">TAMBAH USER</h6>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form action="{{ route('cms.responden.store') }}" method="POST" id="formData" class="form-validate-jquery">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" id="name" class="form-control" required placeholder="Nama Lengkap">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" id="username" class="form-control" required placeholder="Username">
                </div>

                <div class="password-field">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                    </div>

                    <div class="form-group">
                      <label>Ulangi Password</label>
                      <input type="password" id="password_re" name="password_confirmation" class="form-control" required placeholder="Ulangi Password">
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
    function addUser(){
      var red = "{{ route('cms.responden.store') }}";
      $('form').trigger('reset');
      $('#modal_tambah_user').modal('show');
      $('.password-field').show();
      $('.modal-title').text('TAMBAH USER');
      $('.btn-action').text('Simpan');
      $('#formData').removeAttr('action');
      $('#formData').attr('action', red);
    }

    function getEditUser(id) {
			$('form').trigger('reset');
			$('#modal_tambah_user').modal('show');

			var url = "{{ route('cms.responden.edit', ['id' => 'idUserEdit']) }}".replace('idUserEdit', id);
			var red = "{{ route('cms.responden.update', ['id' => 'idUser']) }}".replace("idUser", id);

			$.ajax({
				url: url,
				method: 'GET',
				success: function(response){
					console.log(response);
					$('.password-field').hide();
					$('#password').removeAttr('required');
					$('#password_re').removeAttr('required');
					$('#formData').removeAttr('action');
					$('#formData').attr('action', red);
					$('.modal-title').text('UPDATE USER')
					$('.btn-action').text('Update')
					$('#name').val(response.nama);
					$('#username').val(response.username);
					$('#status').val(response.status);
					// $('#id_user_group').val(response.id_user_group);
				}
			})
		}

     
  </script>
@stop
