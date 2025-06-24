<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            @if ($title == 'Home')
                <i class="fa-solid fa-house-chimney-window me-1 text-success"></i>
            @elseif ($title == 'Peta')
                <i class="fa-solid fa-map-location me-1 text-success"></i>
            @elseif ($title == 'Table')
                <i class="fa-solid fa-table-list me-1 text-info"></i>
            @elseif ($title == 'Dashboard')
                <i class="fa-solid fa-chart-line me-1 text-primary"></i>
            @else
                <i class="fa-solid fa-circle-info me-1 text-secondary"></i>
            @endif
            {{ $title }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Home' ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fa-solid fa-house-chimney-window me-1 text-black"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Peta' ? 'active' : '' }}" href="{{ route('map') }}">
                        <i class="fa-solid fa-map-location me-1 text-success"></i> Peta
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Table' ? 'active' : '' }}" href="{{ route('table') }}">
                        <i class="fa-solid fa-table-list me-1 text-info"></i> Table
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-chart-line me-1 text-primary"></i> Dashboard
                    </a>
                </li>

                {{-- Jika user sudah login --}}
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-layer-group me-1 text-danger"></i> Data
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('api.points') }}" target="_blank">
                                <i class="fa-solid fa-location-dot me-1 text-secondary"></i> Points
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('api.polylines') }}" target="_blank">
                                <i class="fa-solid fa-route me-1 text-secondary"></i> Polylines
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('api.polygons') }}" target="_blank">
                                <i class="fa-solid fa-draw-polygon me-1 text-secondary"></i> Polygons
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link text-danger">
                            <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout
                        </button>
                    </form>
                </li>
                @endauth

                {{-- Jika user belum login --}}
                @guest
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('login') }}">
                        <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Login
                    </a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
