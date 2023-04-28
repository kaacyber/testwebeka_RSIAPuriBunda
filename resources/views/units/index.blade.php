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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($units as $unit)
            <tr>
              <th scope="row">{{ $unit->id }}</th>
              <td>{{ $unit->name_unit}}</td>
              <td>
                <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-success">Edit</a>
              </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">{{ __('Tidak ada data') }}</td>
            </tr>
            @endforelse
          </tbody>
        </table> 
      </div>
    </div>
@endsection