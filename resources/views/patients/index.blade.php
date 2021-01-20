@extends('layouts.panel')

@section('title', 'patients')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">patients</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('patients/create') }}" class="btn btn-sm btn-success">New patient</a>
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
            @foreach($patients as $patient)
                <tr>
                    <th scope="row">
                        {{ $patient->name }}
                    </th>
                    <td>
                        {{ $patient->email }}
                    </td>
                    <td>
                        {{ $patient->cedula }}
                    </td>
                    <td>
                      <form action="{{ url('/patients/'.$patient->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ url('/patients/'.$patient->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
      {{ $patients->links() }}
    </div>
  </div>
@endsection