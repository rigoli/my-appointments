@extends('layouts.panel')

@section('title', 'New doctor')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">@yield('title')</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancel</a>
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

        <form action="{{ url('doctors') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name of doctor</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="cedula" name="cedula" id="cedula" class="form-control" value="{{ old('cedula') }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="address" name="address" id="address" class="form-control" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="phone" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" id="password" class="form-control" value="{{ str_random(6) }}">
            </div>
            <div class="form-group">
                <label for="specialties">Specialties</label>
                <select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-secundary" multiple title="seleccione una o varias">
                    @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection