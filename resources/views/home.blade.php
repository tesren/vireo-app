@extends('components.base')

@section('titles')
    <title>Virēo Living - {{__('Preventa de Condominios y Villas en El Tigre, Nuevo Vallarta, Nayarit')}}</title>
    <meta name="description" content="{{__('Virēo Living, el más reciente desarrollo inmobiliario en preventa en Nuevo Vallarta, Nayarit. Sumérgete en un estilo de vida de lujo y confort con nuestras exclusivas opciones de condominios de 1, 2 y 3 recámaras, así como impresionantes villas de 4 recámaras. Ubicado en el prestigioso El Tigre, ¡Aprovecha esta oportunidad única para asegurar tu hogar de ensueño en uno de los destinos más codiciados de la Riviera Nayarit!')}}">
@endsection

@section('content')

    <div class="position-relative">
        
        <img src="{{asset('/img/ingreso-principal.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 100vh; object-fit:cover;">

        <div class="fondo-oscuro"></div>
    
        <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
          <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center">
              <img class="col-12 col-lg-6 col-xxl-4" src="{{asset('img/vireo-bone-color.svg')}}" alt="Logo de Virēo Living">
              <h1 class="fs-2 mb-4">
                Condominios de 1, 2 y 3 recámaras <br> y 4 Villas Exclusivas
              </h1>
              <a href="#contact" class="btn btn-sand rounded-0 fs-5 shadow-7">Más Información</a>
          </div>
        </div>
    

    </div>

@endsection