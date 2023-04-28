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
                              <div class="form-group">
                                  <label for="unit_id">Unit</label>
                                  <select name="unit_id" id="unit_id" class="form-control select2" style="width: 100%;">
                                      <option value="">Pilih Unit</option>
                                      @foreach($units as $unit)
                                          <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="jabatan_id">Jabatan</label>
                                  <select name="jabatan_id[]" id="jabatan_id" class="form-control" style="width: 100%;" multiple>
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
  @endsection
  
 
