@extends('layouts.main')
  @section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Tambah Karyawan</h3>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('karyawans.store') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                  <label for="name">Nama</label>
                                  <input type="text" name="name" id="name" class="form-control" required>
                              </div>
                              <div class="form-group">
                                  <label for="username">Username</label>
                                  <input type="text" name="username" id="username" class="form-control" required>
                              </div>
                              {{-- <div class="form-group">
                                  <label for="unit_id">Unit</label>
                                  <select name="unit_id" id="unit_id" class="form-control select2" style="width: 100%;">
                                      <option value="">Pilih Unit</option>
                                      @foreach($units as $unit)
                                          <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                      @endforeach
                                  </select>
                              </div> --}}
                              <div class="form-group">
                                <label for="unit_id">Unit</label>
                                <select class="form-control" id="unit_id" name="unit_id">
                                  <option value="">Pilih Unit</option>
                                  @foreach($units as $unit)
                                  <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                  @endforeach
                                </select>
                                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalUnit">Tambah Unit Baru</button>
                              </div>
                              <div class="form-group">
                                  <label for="jabatan_id">Jabatan 1</label>
                                  <select name="jabatan_id[]" id="jabatan_id" class="form-control" style="width: 100%;">
                                    <option value="">Pilih Jabatan 1</option>
                                      @foreach($jabatans as $jabatan)
                                          <option value="{{ $jabatan->id }}">{{ $jabatan->name_jabatan }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="jabatann_id">Jabatan 2</label>
                                <select name="jabatann_id[]" id="jabatann_id" class="form-control" style="width: 100%;">
                                    <option value="">Pilih Jabatan 2</option>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->name_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                  <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                  <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="modalUnit" tabindex="-1" role="dialog" aria-labelledby="unitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="unitModalLabel">Tambah Unit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('units.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name_unit" class="col-md-4 col-form-label text-md-end">{{ __('Name Unit') }}</label>

                    <div class="col-md-6">
                        <input id="name_unit" type="text" class="form-control @error('name_unit') is-invalid @enderror" name="name_unit" value="{{ old('name_unit') }}" required autocomplete="name_unit" autofocus>

                        @error('name_unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
  @endsection
  
 
