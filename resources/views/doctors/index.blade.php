@extends('layouts.panel')

@section('title', 'doctors')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Doctors</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('doctors/create') }}" class="btn btn-sm btn-success">New Doctor</a>
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
            <th scope="col">Name</th>
            <th scope="col">EMail</th>
            <th scope="col">Cedula</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <th scope="row">
                        {{ $doctor->name }}
                    </th>
                    <td>
                        {{ $doctor->email }}
                    </td>
                    <td>
                        {{ $doctor->cedula }}
                    </td>
                    <td>
                      <form action="{{ url('/doctors/'.$doctor->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ url('/doctors/'.$doctor->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
      {{ $doctors->links() }}
    </div>
  </div>
@endsection