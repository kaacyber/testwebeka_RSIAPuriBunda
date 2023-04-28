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
    
                        <table class="table">
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
                                @forelse ($karyawans as $karyawan)
                                <tr>
                                  <td>{{ $karyawan->id }}</td>
                                    <td>{{ $karyawan->name }}</td>
                                    <td>{{ $karyawan->username }}</td>
                                    <td>{{ $karyawan->unit->name_unit }}</td>
                                    <td>
                                        @foreach ($karyawan->jabatan as $jabatan)
                                        {{ $jabatan->name_jabatan }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($karyawan->tanggal_bergabung)->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                      
                                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST"form>
                                      {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                          <button type="submit" class="mr-3 btn btn-danger" onclick="return confirm('Are You Sure?')">{{ __('Hapus') }}</button>
                                      </form>
                                    </td>
                                  </tr>
                                      @empty
                                        <tr>
                                          <td colspan="6" class="text-center">{{ __('Tidak ada data') }}</td>
                                        </tr>
                                      @endforelse
                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                                          
              </div>

@endsection