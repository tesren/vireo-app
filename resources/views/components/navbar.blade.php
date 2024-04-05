<nav class="navbar bg-nav-blurred fixed-top navbar-expand-xl navbar-dark">
    <div class="container-fluid px-2 px-lg-5">

      <a class="navbar-brand" href="{{route('home')}}">
        <img width="160px" src="{{asset('/img/vire-logo-nav.webp')}}" alt="Logo de Virēo Living - El Tigre">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end bg-nav-green" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body bg-nav-green">

          <ul class="navbar-nav text-center justify-content-end flex-grow-1 pe-3">

            <li class="nav-item me-0 mb-3 d-block d-lg-none">
              <img class="w-50" src="{{ asset('/img/vireo-bone-color.svg') }}" alt="Logo de Virēo Living, El Tigre">
            </li>

            <li class="nav-item me-0 me-lg-5 mb-2 mb-lg-0">
              <a class="nav-link" href="{{route('home')}}">{{__('Inicio')}}</a>
            </li>

            <li class="nav-item dropdown me-0 me-lg-5 mb-2 mb-lg-0">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Inventario')}}
              </a>
              <ul class="dropdown-menu bg-sand">
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
              <li class="nav-item me-0 me-lg-5 mb-2 mb-lg-0">
                <a class="nav-link" href="{{ route('construction') }}">{{__('Avance de Obra')}}</a>
              </li>
            @endif

            <li class="nav-item me-0 me-lg-5 mb-2 mb-lg-0">
              <a class="nav-link" href="{{ route('contact') }}">{{__('Contacto')}}</a>
            </li>

            <li class="nav-item me-0 me-lg-5 mb-2 mb-lg-0">

              @php
                $route = Route::currentRouteName();
                $lang = app()->getLocale();
              @endphp

              @if ($lang == 'en')
                @if($route == 'en.unit')

                  <a class="nav-link" title="{{__('Cambiar idioma')}}" href="{{$url = route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type, 'tower'=>$unit->tower_name, 'utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'es');}}">
                    <img src="{{ asset('/img/change-lang-icon.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                  </a>
                
                @else

                  <a href="{{$url = route($route, request()->query(), true, 'es')}}" class="nav-link" title="{{__('Cambiar idioma')}}">
                    <img src="{{ asset('/img/change-lang-icon.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                  </a>

                @endif
              
              @else
                  @if($route == 'es.unit')

                    <a class="nav-link" title="{{__('Cambiar idioma')}}" href="{{$url = route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type, 'tower'=>$unit->tower_name, 'utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'en');}}">
                      <img src="{{ asset('/img/change-lang-icon.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                    </a>
                  
                  @else

                    <a href="{{$url = route($route, request()->query(), true, 'en')}}" class="nav-link" title="{{__('Cambiar idioma')}}">
                      <img src="{{ asset('/img/change-lang-icon.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                    </a>

                  @endif
              @endif

            </li>

          </ul>
          
        </div>

      </div>
    </div>

</nav>