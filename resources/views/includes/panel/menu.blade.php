<h6 class="navbar-heading text-muted">Gestion de datos</h6>

<!-- Navigation -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="./index.html">
        <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/icons.html">
        <i class="ni ni-planet text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/maps.html">
        <i class="ni ni-single-02 text-orange"></i> Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/profile.html">
        <i class="ni ni-satisfied text-info"></i> Pacientes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/tables.html">
        <i class="ni ni-bullet-list-67 text-red"></i> Tables
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="ni ni-key-25"></i> Logout
        </a>
        <form action="{{ route('logout') }}" method="post" style="display: none" id="formLogout">
            @csrf
        </form>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/register.html">
        <i class="ni ni-circle-08 text-pink"></i> Register
        </a>
    </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted"><i class="ni ni-collection"></i> Reportes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
        <i class="ni ni-sound-wave"></i> Frecuencia de citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-spaceship"></i> Medicos mas activos
        </a>
    </li>
</ul>