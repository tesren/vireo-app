<nav class="navbar bg-nav-blurred fixed-top navbar-expand-xl navbar-dark">
    <div class="container-fluid px-2 px-lg-5">

      <a class="navbar-brand" href="{{route('home')}}">
        <img width="180px" src="{{asset('/img/vire-logo-nav.webp')}}" alt="Logo de Virēo Living - El Tigre">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end bg-nav-green" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header">

          <div class="offcanvas-title" id="offcanvasNavbarLabel">
            <img width="180px" src="{{asset('/img/vire-logo-nav.webp')}}" alt="Logo de Virēo Living - El Tigre">
          </div>

          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body bg-nav-green">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item me-0 me-lg-5">
              <a class="nav-link" href="{{route('home')}}">{{__('Inicio')}}</a>
            </li>

            <li class="nav-item dropdown me-0 me-lg-5">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Inventario')}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('condos')}}">{{__('Condominios')}}</a></li>
                <li><a class="dropdown-item" href="{{route('villas')}}">{{__('Villas')}}</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('inventory')}}">{{__('Ver todo')}}</a></li>
              </ul>
            </li>

            @php
              $const_updates = App\Models\ConstructionUpdate::all();
            @endphp

            @if ( count($const_updates) > 0 )
              <li class="nav-item me-0 me-lg-5">
                <a class="nav-link" href="{{ route('construction') }}">{{__('Avance de Obra')}}</a>
              </li>
            @endif

            <li class="nav-item me-0 me-lg-5">
              <a class="nav-link" href="{{ route('contact') }}">{{__('Contacto')}}</a>
            </li>

          </ul>
          
        </div>

      </div>
    </div>

</nav>