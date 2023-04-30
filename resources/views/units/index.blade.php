@extends('layouts.main')
  @section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Units</h1>
  </div>
    <div class="card">
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      <div class="card-header">
        <div class="row">
          <div class="col">
            <form method="GET" action="{{ route('units.index') }}">
              <div class="form-row align-items-center">
                <div class="col">
                  <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>
              </div>
            </form>
          </div>
          <div>
            <a href="{{ route('units.create') }}" class="btn btn-primary mb-2">Create</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="tbl_list">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table> 
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
            { data: 'name_unit', name: 'name_unit' },
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