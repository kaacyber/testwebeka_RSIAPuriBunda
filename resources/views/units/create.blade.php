@extends('layouts.main')
  @section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Unit</h1>
  </div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Unit') }}</div>

                <div class="card-body">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Unit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection