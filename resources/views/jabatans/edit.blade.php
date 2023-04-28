@extends('layouts.main')
  @section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Jabatan</h1>
  </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  {{ __('Edit Jabatan') }}
                  <a href="{{ route('jabatans.index') }}" class="float-right">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jabatans.update', $jabatan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name_jabatan" class="col-md-4 col-form-label text-md-end">{{ __('Name Jabatan') }}</label>

                            <div class="col-md-6">
                                <input id="name_jabatan" type="text" class="form-control @error('name_jabatan') is-invalid @enderror" name="name_jabatan" value="{{ old('name', $jabatan->name_jabatan) }}" required autocomplete="name_jabatan" autofocus>

                                @error('name_jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Jabatan') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
            <div class="mt-2 mb-2">
            <form method="POST" action="{{ route('jabatans.destroy', $jabatan->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete {{ $jabatan->name_jabatan }}</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection