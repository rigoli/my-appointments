@extends('layouts.panel')

@section('title', 'Registrar nueva cita.')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">@yield('title')</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('patients') }}" class="btn btn-sm btn-default">Cancel</a>
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
        <form action="{{ url('patients') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="specialty">Especialidad</label>
                <select name="specialty_id" id="specialty" class="form-control">
                    <option value="">Seleccionar especialidad</option>
                    @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Medicos</label>
                <select name="doctor_id" id="doctor" class="form-control">

                </select>
            </div>
            <div class="form-group">
                <label for="cedula">fecha</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Select date" 
                        type="text" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd"
                        data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+30d"
                        >
                </div>
            </div>
            <div class="form-group">
                <label for="address">Hora de atención</label>
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
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        let $doctor;

        $(function () {
            const $specialty = $('#specialty');
            $doctor = $('#doctor');

            $specialty.change(() => {
                const specialtyId = $specialty.val();
                const url = `/specialties/${specialtyId}/doctors`;
                $.getJSON(url, onDoctorsLoaded);
            });
        });

        function onDoctorsLoaded (doctors) {
            let htmlOptions = '';

            doctors.forEach(doctor => {
                htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`
            });

            $doctor.html(htmlOptions);
        }
    </script>

@endsection