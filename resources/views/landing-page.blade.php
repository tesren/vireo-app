@extends('components.base')

@section('titles')
    <title>Virēo Living - Preventa de Condominios y Villas en El Tigre, Nuevo Vallarta, Nayarit</title>
    <meta name="description" content="Virēo Living, el más reciente desarrollo inmobiliario en preventa en Nuevo Vallarta, Nayarit. Sumérgete en un estilo de vida de lujo y confort con nuestras exclusivas opciones de condominios de 1, 2 y 3 recámaras, así como impresionantes villas de 4 recámaras. Ubicado en el prestigioso El Tigre, ¡Aprovecha esta oportunidad única para asegurar tu hogar de ensueño en uno de los destinos más codiciados de la Riviera Nayarit!">
@endsection

@section('content')

  {{-- Inicio --}}
  <div class="position-relative mb-6">
    <img src="{{asset('img/alberca-amenidades.webp')}}" alt="Alberca de Virēo Living" class="w-100" style="height: 100vh; object-fit:cover;">

    <div class="fondo-oscuro"></div>

    <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
      <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center">
          <img class="col-12 col-lg-6 col-xxl-3" src="{{asset('img/vireo-bone-color.svg')}}" alt="Logo de Virēo Living">
          <h1 class="fs-2 mb-4">
            Condominios de 1, 2 y 3 recámaras <br> y 4 Villas Exclusivas
            <div class="fs-4">Precios desde $6,795,000 MXN</div>
            <div class="fs-7">Plan A con 10% de descuento</div>
          </h1>
          <a href="#contact" class="btn btn-sand rounded-0 fs-5 shadow-7">Más Información</a>
      </div>
    </div>
  </div>

  {{-- Descipción --}}
  <div class="row justify-content-evenly mb-6">
      <div class="col-12 col-lg-4 align-self-center mb-5 mb-lg-0 text-center text-lg-start">
        <h2 class="fs-1">Sobre el proyecto</h2>
        <p class="fw-light mb-4">
            Descubre un estilo de vida privilegiado en Nuevo Vallarta, Nayarit, con la preventa exclusiva de Virēo Living, ubicado estratégicamente en Paseo de las Garzas #291, frente al hoyo #5 del prestigioso campo de golf El Tigre Golf & Country Club.
            <br> <br>
            Condominios de una, dos y tres recámaras y Villas de cuatro recámaras, Virēo Living ofrece opciones para todos los gustos y necesidades.
        </p>
        <a href="#contact" class="btn btn-blue rounded-0 fs-5 shadow-4">Contactar a un asesor</a>
      </div>

      <div class="col-12 col-lg-4">
        <img src="{{asset('img/location-render.webp')}}" alt="Virēo Living Master Plan" class="w-100 shadow-4 rounded-3" loading="lazy">
      </div>
  </div>

  {{-- Amenidades --}}
  <div class="row justify-content-center mb-6 py-5 bg-green">

      <div class="col-12 col-lg-10 col-xxl-7 text-center">

          <h2 class="fs-1 mb-2">Amenidades</h2>
          <p class="fs-6 mb-4 mb-lg-5 fw-light">Disfruta de las amenidades exclusivas, que incluyen terraza pergolada, alberca de adultos y niños, pista de jogging, golf lounge y lobby.</p>

          <div id="carouselExampleIndicators" class="carousel slide shadow-4">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              </div>

              <div class="carousel-inner">

                <div class="carousel-item active">
                  <img src="{{asset('/img/pista-joggin-torre-B.webp')}}" class="d-block w-100" alt="Pista de Jogging de Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                      <h3>Pista de Jogging</h3>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="{{asset('/img/lobby-principal.webp')}}" class="d-block w-100" alt="Lobby Principal de Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                      <h3>Lobby Principal</h3>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="{{asset('/img/alberca-amenidades.webp')}}" class="d-block w-100" alt="Alberca Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                      <h3>Alberca</h3>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="{{asset('/img/coworking-area.webp')}}" class="d-block w-100" alt="Golf Lounge Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                      <h3>Golf Lounge</h3>
                  </div>
                </div>

              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
          </div>

      </div>

  </div>

  {{-- Interiores --}}
  <div class="row justify-content-evenly mb-6 text-center text-lg-start">
      <div class="col-12 col-lg-5 mb-4 mb-lg-0">
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
                    <h4>Alberca - Villas</h4>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="{{asset('/img/debpa-b02.webp')}}" class="d-block w-100" alt="Sala Comedor de los Condominios Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                    <h4>Sala Comedor - Condominios</h4>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="{{asset('/img/depa-a01.webp')}}" class="d-block w-100" alt="Sala Comedor de los Condominios Virēo Living" loading="lazy">
                  <div class="carousel-caption">
                    <h4>Sala Cocina - Condominios</h4>
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

      <div class="col-12 col-lg-5 align-self-center">
          <h3 class="fs-1">Interiores</h3>
          <p class="fw-light">Acabados de alta calidad, como pisos de Travertino Veracruz, cocina con cubierta de granito blanco y sistema de aire acondicionado fan & coil, garantizan el confort y la elegancia en cada detalle. </p>
          <p class="fw-light mb-4">Además, con superficies que van desde 84.38 m² hasta 455 m², encontrarás el espacio perfecto para ti y tu familia. </p>
          <a href="#contact" class="btn btn-blue shadow-4 rounded-0">Contacta un asesor</a>
      </div>
  </div>

  {{-- Ubicación --}}
  <div class="row justify-content-evenly mb-6 py-5 bg-green">

    <div class="col-12 col-lg-4 align-self-center">
      <h4 class="fs-1 text-center text-lg-start">Ubicación</h4>
      <p class="fw-light">
        Ubicado estratégicamente en Paseo de las Garzas #291, frente al hoyo #5 del prestigioso campo de golf El Tigre Golf & Country Club.
        <br><br>
        La Torre A brinda vistas espectaculares al campo de golf, mientras que la Torre B ofrece vistas a las áreas comunes.
      </p>
    </div>

    <div class="col-12 col-lg-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7464.3161031868585!2d-105.29469164486922!3d20.703805580865442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842146962726718f%3A0x64401401488f6019!2sP.%C2%BA%20de%20las%20Garzas%20290%2C%20El%20Tigre%2C%2063735%20Nuevo%20Vallarta%2C%20Nay.!5e0!3m2!1ses-419!2smx!4v1709924622735!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
    </div>

  </div>

  <div class="mb-6" id="contact">
    @include('components.contact-form')
    {{-- <h5 class="text-center mb-2 fs-1">
      Contacto
    </h5>

    <p class="px-3 fs-5 mb-4">
      Sí estás interesado puedes contactarnos para <br> inscribirte a nuestra lista de espera, de la preventa privada
    </p>

    <a href="https://wa.me/5213322005523?text={{ urlencode(__('Hola, vengo del sitio web de Virēo Living')) }}" class="btn btn-blue fs-5" target="_blank" rel="noopener noreferrer">
      <i class="fa-brands fa-whatsapp"></i> Contactar por WhatsApp
    </a> --}}
  </div>

  @include('components.whatsapp-btn')

  {{-- Footer --}}
  <footer class="bg-green py-5">

      <div class="row justify-content-evenly">

          <div class="col-12 col-lg-3 mb-5 mb-lg-0 align-self-center order-2 order-lg-1 text-center text-lg-start">
              <a class="link-light d-block mt-3 text-decoration-none fs-5 fw-light" href="tel:+523322005523">
                  <i class="fa-solid fa-phone"></i> +52 (332)-200-5523
              </a>
              <a href="mailto:info@domusvallarta.com" class="link-light d-block mt-3 text-decoration-none fs-5 fw-light">
                  <i class="fa-solid fa-envelope"></i> info@domusvallarta.com
              </a>
          </div>

          <div class="col-7 col-lg-3 col-xl-2 order-1 order-lg-2">
              <img src="{{asset('img/vireo-bone-color.svg')}}" alt="Logo de Virēo Living" class="w-100">
          </div>

          <div class="col-11 col-lg-3 align-self-center order-3 text-center">
              <a href="https://domusvallarta.com/" class="text-decoration-none link-light">
                  <img width="200px" src="{{asset('/img/domus-logo-white.svg')}}" alt="Logo Domus Vallarta Inmobiliaria">
                  <div class="mt-3 fs-5 fw-light">Comercializador exclusivo</div>
              </a> 
          </div>

      </div>

  </footer>

@endsection