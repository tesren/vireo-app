<nav class="navbar bg-blurred fixed-top navbar-expand-xl">
    <div class="container-fluid px-2 px-lg-5">

      <a class="navbar-brand" href="{{route('home')}}">
        <img width="180px" src="{{asset('/img/vire-logo-nav.webp')}}" alt="Logo de Vireo Living - El Tigre">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">{{__('Inicio')}}</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Inventario')}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">{{__('Condominios')}}</a></li>
                <li><a class="dropdown-item" href="#">{{__('Villas')}}</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">{{__('Ver todo')}}</a></li>
              </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">{{__('Avance de Obra')}}</a>
            </li>

          </ul>
          
        </div>

      </div>
    </div>

</nav>