@extends('layouts.panel')

@section('title', 'Specialties')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Specialties</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('specialties/create') }}" class="btn btn-sm btn-success">New specialty</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          <strong>Success!</strong> {{ session('notification') }}
        </div>
      @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Spetialty</th>
            <th scope="col">Description</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
            @foreach($specialties as $specialty)
                <tr>
                    <th scope="row">
                        {{ $specialty->name }}
                    </th>
                    <td>
                        {{ $specialty->description }}
                    </td>
                    <td>
                      <form action="{{ url('/specialties/'.$specialty->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ url('/specialties/'.$specialty->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection