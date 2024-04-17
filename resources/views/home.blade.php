@extends('components.base')

@section('titles')
    <title>Virēo Living - {{__('Preventa de Condominios y Villas en El Tigre, Nuevo Vallarta, Nayarit')}}</title>
    <meta name="description" content="{{__('Virēo Living, el más reciente desarrollo inmobiliario en preventa en Nuevo Vallarta, Nayarit. Sumérgete en un estilo de vida de lujo y confort con nuestras exclusivas opciones de condominios de 1, 2 y 3 recámaras, así como impresionantes villas de 4 recámaras. Ubicado en el prestigioso El Tigre, ¡Aprovecha esta oportunidad única para asegurar tu hogar de ensueño en uno de los destinos más codiciados de la Riviera Nayarit!')}}">
@endsection

@section('content')

  {{-- inicio --}}
  <div class="position-relative">
      
    <img src="{{asset('/img/ingreso-principal.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 100vh; object-fit:cover;">

    <div class="fondo-oscuro"></div>

    <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
      <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center">
        <img class="col-12 col-lg-6 col-xxl-4" src="{{asset('img/vireo-bone-color.svg')}}" alt="Logo de Virēo Living">
        <h1 class="fs-2 mb-4">
          {{__('Condominios de 1, 2 y 3 recámaras')}} <br> {{__('y 4 Villas Exclusivas')}}
        </h1>
        <a href="{{ route('graphic.inventory', request()->query() ) }}" class="btn btn-sand rounded-0 fs-5 shadow-7">{{__('Ver Inventario')}}</a>
      </div>
    </div>
  

  </div>

  <img src="{{asset('img/details.svg')}}" alt="" class="w-100 d-none d-lg-block" style="height: 100px; object-fit:cover;" loading="lazy">

  {{-- descripcion --}}
  <section class="row justify-content-evenly mb-6 bg-green py-5 mt-5 mt-lg-0">

    <div class="col-12 col-lg-5 align-self-center mb-4 mb-lg-0 text-center text-lg-start">
      <h2 class="fs-2">{{__('Sobre el Proyecto')}}</h2>
      <p>{{__('Descubre un estilo de vida privilegiado en Nuevo Vallarta, Nayarit, con la preventa exclusiva de Virēo Living, ubicado estratégicamente en Paseo de las Garzas #291, frente al hoyo #5 del prestigioso campo de golf El Tigre Golf & Country Club. Condominios de una, dos y tres recámaras y Villas de cuatro recámaras, Virēo Living ofrece opciones para todos los gustos y necesidades.')}}</p>
      <a href="{{ route('graphic.inventory', request()->query() ) }}" class="btn btn-sand fs-5 rounded-0 shadow-7">{{__('Ver Inventario')}}</a>    
    </div>

    <div class="col-12 col-lg-5">
      <img src="{{asset('img/interiors-home.webp')}}" alt="Interiores de Virēo Living ElTigre" class="w-100 shadow-7" loading="lazy">
    </div>

  </section>

  {{-- Amenidades --}}
  <section class="row position-relative mb-0">

    <h2 class="position-absolute w-auto top-50 start-50 text-green bg-sand py-1 px-3 rounded-0 z-3" style="transform: translateX(-50%) translateY(-50%);">
      {{__('Amenidades')}}
    </h2>

    <div class="fondo-oscuro-sutil"></div>

    <div class="col-6 col-lg-7 px-0 position-relative">
      <img src="{{asset('/img/amenities-pool.webp')}}" alt="Alberca de Virēo Living" class="w-100" style="height: 40vh; object-fit:cover;" data-fancybox="amenities" loading="lazy">

      <div class="row justify-content-center position-absolute bottom-0 start-0 h-100 w-100 mb-2 z-3">
        <div class="col-12 text-center align-self-center align-self-lg-end">
          <a href="#amenities-1" class="fs-4 mb-0 text-decoration-underline text-sand">{{__('Alberca')}}</a>
        </div>
      </div>

    </div>

    <div class="col-6 col-lg-5 px-0 position-relative">
      <img src="{{asset('/img/amenities-jogging.webp')}}" alt="Pista de Jogging de Virēo Living" class="w-100" style="height: 40vh; object-fit:cover;" data-fancybox="amenities" loading="lazy">

      <div class="row justify-content-center position-absolute bottom-0 start-0 h-100 w-100 mb-2 z-3">
        <div class="col-12 text-center align-self-center align-self-lg-end">
          <a href="#amenities-2" class="fs-4 mb-0 text-decoration-underline text-sand">{{__('Pista de Jogging')}}</a>
        </div>
      </div>

    </div>

    <div class="col-6 col-lg-5 px-0 position-relative">
      <img src="{{asset('img/amenities-golf-lounge.webp')}}" alt="Golf Lounge en Virēo Living" class="w-100" style="height: 40vh; object-fit:cover;" data-fancybox="amenities" loading="lazy">

      <div class="row justify-content-center position-absolute bottom-0 start-0 h-100 w-100 mb-2 z-3">
        <div class="col-12 text-center align-self-center align-self-lg-end">
          <a href="#amenities-3" class="fs-4 mb-0 text-decoration-underline text-sand">{{__('Golf Lounge')}}</a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-7 px-0 position-relative">
      <img src="{{asset('img/amenities-lobby.webp')}}" alt="Lobby de Virēo Living" class="w-100" style="height: 40vh; object-fit:cover;" data-fancybox="amenities" loading="lazy">

      <div class="row justify-content-center position-absolute bottom-0 start-0 h-100 w-100 mb-2 z-3">
        <div class="col-12 text-center align-self-center align-self-lg-end">
          <a href="#amenities-4" class="fs-4 mb-0 text-decoration-underline text-sand">{{__('Lobby Principal')}}</a>
        </div>
      </div>
      
    </div>

  </section>

  <img src="{{asset('img/bg-leaf.webp')}}" alt="" class="w-100" style="height: 100px; object-fit:cover;" loading="lazy">

  {{-- Interiores --}}
  <section class="row justify-content-center justify-content-lg-start mb-0 text-center text-lg-start bg-green py-5 py-lg-0">
    <div class="col-12 col-lg-7 mb-4 mb-lg-0">
      <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('/img/villa-interior-exterior.webp')}}" class="d-block w-100" alt="Terraza de la Villa Virēo Living" loading="lazy">
            <div class="carousel-caption">
              <h4>Exterior - Villas</h4>
            </div>
          </div>

          <div class="carousel-item">
            <img src="{{asset('/img/fachada-villa.webp')}}" class="d-block w-100" alt="Alberca de las Villas Virēo Living" loading="lazy">
            <div class="carousel-caption">
              <h4>{{__('Alberca')}} - Villas</h4>
            </div>
          </div>

          <div class="carousel-item">
            <img src="{{asset('/img/debpa-b02.webp')}}" class="d-block w-100" alt="Sala Comedor de los Condominios Virēo Living" loading="lazy">
            <div class="carousel-caption">
              <h4>{{__('Sala Comedor')}} - {{__('Condominios')}}</h4>
            </div>
          </div>

          <div class="carousel-item">
            <img src="{{asset('/img/depa-a01.webp')}}" class="d-block w-100" alt="Sala Comedor de los Condominios Virēo Living" loading="lazy">
            <div class="carousel-caption">
              <h4>{{__('Sala Cocina')}} - {{__('Condominios')}}</h4>
            </div>
          </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="col-12 col-lg-5 px-2 px-lg-5 align-self-center">
      <h3 class="fs-1">{{__('Interiores')}}</h3>
      <p class="fw-light">{{__('Acabados de alta calidad, como pisos de Travertino Veracruz, cocina con cubierta de granito blanco y sistema de aire acondicionado fan & coil, garantizan el confort y la elegancia en cada detalle.')}} </p>
      <p class="fw-light mb-4">{{__('Además, con superficies que van desde 84.38 m² hasta 455 m², encontrarás el espacio perfecto para ti y tu familia.')}} </p>
      <a href="#contact" class="btn btn-sand shadow-4 rounded-0 fs-5">{{__('Contacta un asesor')}}</a>
    </div>
  </section>

  <img src="{{asset('img/bg-leaf-2.webp')}}" alt="" class="w-100" style="height: 100px; object-fit:cover;" loading="lazy">

  {{-- Ubicacion --}}
  <section class="row justify-content-center bg-green">

    <div class="col-12 col-lg-5 align-self-center px-2 px-lg-5 py-5 py-lg-0">
      <h4 class="fs-1 text-center text-lg-start">{{__('Ubicación')}}</h4>
      <p class="fw-light">
        {{__('Ubicado estratégicamente en Paseo de las Garzas #291, frente al hoyo #5 del prestigioso campo de golf El Tigre Golf & Country Club.')}}
        <br><br>
        {{__('La Torre A brinda vistas espectaculares al campo de golf, mientras que la Torre B ofrece vistas a las áreas comunes.')}}
      </p>
    </div>

    <div class="col-12 col-lg-7 px-0 py-0">
      <div class="w-100" id="map" style="height: 600px;"></div>
    </div>

  </section>

  {{-- Formulario --}}
  @include('components.contact-form')

@endsection

@section('javascript')
  <script>

    // Tu código aquí se ejecutará una vez que el DOM esté listo
    let map;

    async function initMap() {

      const { Map } = await google.maps.importLibrary("maps");

      let lat = '20.703895194267'; 
      let long = '-105.28934848857'; 

      let dev_position = new google.maps.LatLng(lat, long);

      map = new Map(document.getElementById("map"), {
        center: dev_position,
        zoom: 14,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: true,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false
      });

      const marker = new google.maps.Marker({
        position: dev_position,
        map: map,
        draggable: false,
      });
    }
    
  </script>
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANY3liQL-YPxxqSI76WOTso91EPHv-XXk&amp;callback=initMap"></script>
@endsection