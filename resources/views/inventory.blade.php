@extends('components.base')

@section('titles')
    <title>Virēo Living - {{__('Inventario Disponible')}}</title>
    <meta name="description" content="{{__('Explora nuestra amplia selección de condominios y villas disponibles en Virēo Living, ubicado en El Tigre, Nuevo Vallarta, Nayarit. Encuentra la residencia perfecta que se adapte a tu estilo de vida, con opciones de una a tres recámaras y villas de cuatro recámaras. Filtra por características clave y descubre un estilo de vida excepcional frente al prestigioso campo de golf El Tigre Golf & Country Club.')}}">
@endsection

@section('content')

    {{-- Inicio --}}
    <div class="position-relative">
        
        <img src="{{asset('img/pista-joggin-torre-B.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 45vh; object-fit:cover;">

        <div class="fondo-oscuro"></div>

        <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
            <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center mt-6">

                <h1 class="fs-1 mb-4 text-decoration-underline">
                    @if ( Route::currentRouteName() == 'condos' or Route::currentRouteName() == 'es.condos' or Route::currentRouteName() == 'en.condos')
                        {{ __('Condominios Disponibles') }}
                    @elseif(Route::currentRouteName() == 'villas' or Route::currentRouteName() == 'es.villas' or Route::currentRouteName() == 'en.villas')
                        {{ __('Villas Disponibles') }}
                    @else
                        {{ __('Condominios y Villas Disponibles') }}
                    @endif
                </h1>
                
            </div>
        </div>

    </div>

    {{-- Simbología --}}
    <div class="fs-5 d-flex justify-content-center text-center my-4">
        <div class="me-4">{{__('Simbología')}}</div>
        <div class="badge bg-success rounded-pill fw-light me-3 align-self-center">{{__('Disponible')}}</div>
        <div class="badge bg-warning rounded-pill fw-light me-3 align-self-center">{{__('Apartada')}}</div>
        <div class="badge bg-danger rounded-pill fw-light me-3 align-self-center">{{__('Vendida')}}</div>
    </div>

    {{-- Formulario de búsqueda --}}
    @include('components.searchform')

    {{-- Condominios --}}
    @if($units->isNotEmpty())

        @if( Route::currentRouteName() ==  'search' or Route::currentRouteName() ==  'es.search' or Route::currentRouteName() ==  'en.search')
            <h2 class="mb-4 text-center">{{__('Resultados de búsqueda')}}</h2>
        @endif
        
        <section class="row justify-content-center container mb-6">

            @foreach ($units as $unit)

                @php
                    $images = $unit->unitType->getMedia('gallery');
                    $portrait = $images[0]->getUrl('thumb');
                    $status_class = $unit->status;

                    switch ($status_class) {
                        case 'Disponible':
                            $status_class = 'bg-success';
                            break;

                        case 'Apartada':
                            $status_class = 'bg-warning';
                            break;

                        case 'Vendida':
                            $status_class = 'bg-danger';
                            break;
                        
                        default:
                            $status_class = 'bg-success';
                            break;
                    }
                @endphp

                <a href="{{ route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type ]) }}" class="col-12 col-lg-4 text-decoration-none">

                    <div class="card w-100 shadow-4 rounded-0 position-relative">

                        <div class="position-absolute top-0 start-0 badge {{$status_class}} rounded-pill fw-light mt-4 ms-3 fs-6 border-sand">
                            {{$unit->status}}
                        </div>
                        
                        <div class="position-absolute top-0 end-0 bg-blurred m-3 text-sand py-1 px-2 fs-5 border-gradient border-sand">
                            <strong>${{ number_format($unit->price) }} </strong>
                            <span class="fw-light">{{$unit->currency}}</span>
                        </div>

                        <img src="{{ $portrait }}" class="w-100" alt="{{$unit->unitType->property_type}} {{$unit->name}}" style="height: 300px; object-fit:cover;">

                        <div class="card-body text-green">
                            <h2 class="card-title fs-4">{{$unit->unitType->property_type}} {{$unit->name}}</h2>
                            <p class="card-text fs-7">
                                {{__($unit->unitType->property_type)}} {{__('con')}} {{$unit->unitType->bedrooms}} {{__('recámaras')}}, {{$unit->unitType->bathrooms}} {{__('baños y un área total de')}} 
                                {{$unit->total_const}} m², {{__('ubicado en el piso')}} {{$unit->floor}} {{__('de la Torre')}} {{$unit->tower_name}}.
                            </p>

                            <div class="d-flex fs-5 justify-content-center fw-light">
                                <div class="me-3">
                                    <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}}
                                </div>

                                <div class="me-3">
                                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                                </div>

                                <div>
                                    <i class="fa-solid fa-house"></i> {{number_format($unit->total_const, 2)}} m²
                                </div>
                            </div>
                        </div>

                    </div>

                </a> 
            @endforeach

        </section>

    @else
        <h2 class="mb-5 text-center fs-3">
            {{__('Lo sentimos, no hay unidades disponibles para tu criterio de búsqueda')}}
            <div class="fs-5">{{__('Pero estas unidades podrían interesarte')}}</div>
        </h2>

        @php
            $more_units = App\Models\Unit::inRandomOrder()->limit(3)->get();
        @endphp

        <div class="container row mb-6">
            @foreach ($more_units as $unit)
                    
                @php
                    $images = $unit->unitType->getMedia('gallery');
                    $portrait = $images[0]->getUrl('thumb');
                    $status_class = $unit->status;

                    switch ($status_class) {
                        case 'Disponible':
                            $status_class = 'bg-success';
                            break;

                        case 'Apartada':
                            $status_class = 'bg-warning';
                            break;

                        case 'Vendida':
                            $status_class = 'bg-danger';
                            break;
                        
                        default:
                            $status_class = 'bg-success';
                            break;
                    }
                @endphp

                <a href="#" class="col-12 col-lg-4 text-decoration-none">

                    <div class="card w-100 shadow-4 rounded-0 position-relative">

                        <div class="position-absolute top-0 start-0 badge {{$status_class}} rounded-pill fw-light mt-4 ms-3 fs-6 border-sand">
                            {{$unit->status}}
                        </div>
                        
                        <div class="position-absolute top-0 end-0 bg-blurred m-3 text-sand py-1 px-2 fs-5 border-gradient border-sand">
                            <strong>${{ number_format($unit->price) }} </strong>
                            <span class="fw-light">{{$unit->currency}}</span>
                        </div>

                        <img src="{{ $portrait }}" class="w-100" alt="{{$unit->unitType->property_type}} {{$unit->name}}" style="height: 300px; object-fit:cover;">

                        <div class="card-body text-green">
                            <h2 class="card-title fs-4">{{$unit->unitType->property_type}} {{$unit->name}}</h2>
                            <p class="card-text fs-7">
                                {{__($unit->unitType->property_type)}} {{__('con')}} {{$unit->unitType->bedrooms}} {{__('recámaras')}}, {{$unit->unitType->bathrooms}} {{__('baños y un área total de')}} 
                                {{$unit->total_const}} m², {{__('ubicado en el piso')}} {{$unit->floor}} {{__('de la Torre')}} {{$unit->tower_name}}.
                            </p>

                            <div class="d-flex fs-5 justify-content-center fw-light">
                                <div class="me-3">
                                    <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}}
                                </div>

                                <div class="me-3">
                                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                                </div>

                                <div>
                                    <i class="fa-solid fa-house"></i> {{number_format($unit->total_const, 2)}} m²
                                </div>
                            </div>
                        </div>

                    </div>

                </a> 
            @endforeach
        </div>
    
    @endif

    

    {{-- Formulario --}}
    @include('components.contact-form')

@endsection
