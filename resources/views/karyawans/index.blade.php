@extends('layouts.main')
  @section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
  </div>
    <div class="card">
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Karyawan') }}</div>
    
                    <div class="card-body">
                        <a href="{{ route('karyawans.create') }}" class="btn btn-primary mb-3">{{ __('Tambah Karyawan') }}</a>
    
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
    
                        <table id="tbl_list" class="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th scope="col">{{ __('Id') }}</th>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('Username') }}</th>
                                    <th scope="col">{{ __('Unit') }}</th>
                                    <th scope="col">{{ __('Jabatan ') }}</th>
                                    <th scope="col">{{ __('Tanggal Bergabung') }}</th>
                                    <th scope="col">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>


@endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'username', name: 'username' },
            { data: 'unit.name_unit', name: 'name_unit' },
            { data: 'jabatan', name: 'name_jabatan'},
            { data: 'tanggal_bergabung', name: 'tanggal_bergabung' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ],
            fnDrawCallback: function() {
                $('.btn-edit').click(function(e){
                    e.preventDefault();
                    window.location.href = $(this).attr('href');
                });

                $('.btn-delete').click(function(e){
                    e.preventDefault();
                    var url = $(this).attr('href');
                    if(confirm('Are you sure you want to delete this data?')){
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res){
                                if(res.success){
                                    alert('Data berhasil dihapus');
                                    $('#tbl_list').DataTable().ajax.reload();
                                } else {
                                    alert('Data gagal dihapus');
                                }
                            },
                            error: function(xhr){
                                alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                            }
                        });
                    }
                });
            }
        });
    });
</script>
@endpush

