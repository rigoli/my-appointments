@extends('layouts.panel')

@section('title', 'Edit Specialty')

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
        <form action="{{ url('specialties/'.$specialty->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name of specialty</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $specialty->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="description" name="description" id="description" class="form-control" value="{{ old('decription', $specialty->description) }}">
                {{-- <textarea name="description" id="description" cols="30" rows="10"></textarea> --}}
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
  </div>
@endsection