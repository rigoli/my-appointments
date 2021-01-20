@extends('layouts.panel')

@section('title', 'New Specialty')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">@yield('title')</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">Cancel</a>
        </div>
      </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        <form action="{{ url('specialties') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name of specialty</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="description" name="description" id="description" class="form-control" value="{{ old('description') }}">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
  </div>
@endsection