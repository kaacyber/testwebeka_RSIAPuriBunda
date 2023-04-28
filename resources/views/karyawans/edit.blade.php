@extends('layouts.main')
  @section('content')
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Karyawan') }}</h1>
  </div>
 
            <div class="card">
                <div class="card-header">{{ __('Edit Karyawan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('karyawans.update', $karyawan) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $karyawan->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $karyawan->username) }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                              </div>
  
                              <div class="form-group row">
                                  <label for="unit_id" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>
  
                                  <div class="col-md-6">
                                      <select id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" required>
                                          <option value="" disabled selected>-- Pilih Unit --</option>
                                          @foreach ($units as $unit)
                                              <option value="{{ $unit->id }}" {{ $karyawan->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name_unit }}</option>
                                          @endforeach
                                      </select>
  
                                      @error('unit_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
  
                              <div class="form-group row">
                                  <label for="tanggal_bergabung" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Bergabung') }}</label>
  
                                  <div class="col-md-6">
                                      <input id="tanggal_bergabung" type="date" class="form-control @error('tanggal_bergabung') is-invalid @enderror" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', $karyawan->tanggal_bergabung) }}" required>
  
                                      @error('tanggal_bergabung')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
  
                              <div class="form-group row">
                                  <label for="jabatan_id" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
  
                                  <div class="col-md-6">
                                      <select id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" name="jabatan_id[]" multiple required>
                                          @foreach ($jabatans as $jabatan)
                                              <option value="{{ $jabatan->id }}" {{ in_array($jabatan->id, $karyawan->jabatan->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $jabatan->name_jabatan }}</option>
                                          @endforeach
                                      </select>
  
                                      @error('jabatan_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
  
                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Update') }}
                                      </button>
                                      <a href="{{ route('karyawans.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              
  @endsection