<h6 class="navbar-heading text-muted">
    @if (auth()->user()->role == 'admin') 
        Gestion de datos
    @else
        Menu
    @endif
</h6>

<!-- Navigation -->
<ul class="navbar-nav">
    @if (auth()->user()->role == 'admin') 
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties') }}">
            <i class="ni ni-planet text-blue"></i> Specialties
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctors') }}">
            <i class="ni ni-single-02 text-orange"></i> Doctors
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/patients') }}">
            <i class="ni ni-satisfied text-info"></i> Patients
            </a>
        </li>
    @elseif (auth()->user()->role == 'doctor') 
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/schedule') }}">
                <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar horarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctors') }}">
                <i class="ni ni-time-alarm text-orange"></i> Mis citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties') }}">
                <i class="ni ni-planet text-blue"></i> Mis pacientes
            </a>
        </li>
    @else 
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctors') }}">
                <i class="ni ni-send text-orange"></i> Reservar cita
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctors') }}">
                <i class="ni ni-time-alarm text-orange"></i> Mis citas
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="ni ni-key-25"></i> Logout
        </a>
        <form action="{{ route('logout') }}" method="post" style="display: none" id="formLogout">
            @csrf
        </form>
    </li>

</ul>
@if (auth()->user()->role == 'admin') 
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted"><i class="ni ni-collection"></i> Reportes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="ni ni-sound-wave"></i> Frecuencia de citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="ni ni-spaceship"></i> Medicos mas activos
        </a>
    </li>
@endif
</ul>
