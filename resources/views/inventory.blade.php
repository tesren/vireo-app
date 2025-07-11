@extends('components.base')

@section('titles')
    <title>
        @if ( Route::currentRouteName() == 'condos' or Route::currentRouteName() == 'es.condos' or Route::currentRouteName() == 'en.condos')
            {{__('Inventario de Condominios en Venta')}} - Virēo Living, El Tigre
        @elseif(Route::currentRouteName() == 'villas' or Route::currentRouteName() == 'es.villas' or Route::currentRouteName() == 'en.villas')
            {{__('Inventario de Villas en Venta')}} - Virēo Living, El Tigre
        @else
            {{__('Inventario de Condominios y Villas en Venta')}} - Virēo Living, El Tigre
        @endif
    </title>

    <meta name="description" content="{{__('Explora nuestra amplia selección de condominios y villas disponibles en Virēo Living, ubicado en El Tigre, Nuevo Vallarta, Nayarit. Encuentra la residencia perfecta que se adapte a tu estilo de vida, con opciones de una a tres recámaras y villas de cuatro recámaras. Filtra por características clave y descubre un estilo de vida excepcional frente al prestigioso campo de golf El Tigre Golf & Country Club.')}}">
@endsection

@section('content')

    {{-- Inicio --}}
    <div class="position-relative">
        
        <img src="{{asset('img/pista-joggin-torre-B.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 45vh; object-fit:cover;">

        <div class="fondo-oscuro"></div>

        <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
            <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center mt-6">

                <h1 class="fs-1 mb-0 text-decoration-underline">
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

    @include('components.simbology')

    {{-- Formulario de búsqueda --}}
    @include('components.searchform')

    <div class="container input-group justify-content-end mb-4 text-end">
        <a href="{{route('graphic.inventory', request()->query() )}}" class="btn btn-outline-green rounded-end-0 rounded-start-circle"><i class="fa-solid fa-border-all"></i></a>
        <a href="{{route('inventory', request()->query() )}}" class="btn btn-outline-green rounded-start-0 rounded-end-circle"><i class="fa-solid fa-list"></i></a>
    </div>

    {{-- Condominios --}}
    @if($units->isNotEmpty())

        @if( Route::currentRouteName() ==  'search' or Route::currentRouteName() ==  'es.search' or Route::currentRouteName() ==  'en.search')
            <h2 class="mb-4 text-center">{{__('Resultados de búsqueda')}}</h2>
        @endif
        
        <section class="row justify-content-center container mb-5">

            @foreach ($units as $unit)

                @php
                    $images = $unit->unitType->getMedia('gallery');
                    $status_class = $unit->status;

                    if( !isset($images[0]) ){
                        $portrait = asset('/img/depa-c02.webp');
                    }else{
                        $portrait = $images[0]->getUrl('thumb');
                    }

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

                <a href="{{ route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type, 'tower'=>$unit->tower_name, 'contact' => request()->query('contact') ]) }}" class="col-12 col-lg-4 text-decoration-none mb-4 mb-lg-5">

                    <div class="card w-100 shadow-4 rounded-0 position-relative">

                        <div class="position-absolute top-0 start-0 badge {{$status_class}} rounded-pill fw-light mt-4 ms-3 fs-6 border-sand">
                            {{__($unit->status)}}
                        </div>
                        
                        @if ( $unit->status != 'Vendida' and $unit->price != 0)
                            <div class="position-absolute top-0 end-0 bg-blurred m-3 text-sand py-1 px-2 fs-5 border-gradient border-sand">
                                <strong>${{ number_format($unit->price) }} </strong>
                                <span class="fw-light">{{$unit->currency}}</span>
                            </div>
                        @endif

                        <img src="{{ $portrait }}" class="w-100" alt="{{$unit->unitType->property_type}} {{$unit->name}}" style="height: 300px; object-fit:cover;">

                        <div class="card-body text-green">
                            <h3 class="card-title fs-5">{{__($unit->unitType->property_type)}} {{$unit->name}} - {{__('Torre')}} {{$unit->tower_name}}</h3>

                            @php
                                $bedrooms = $unit->unitType->bedrooms;
                            @endphp

                            <p class="card-text fs-7">
                                {{__($unit->unitType->property_type)}} {{__('con')}} {{$bedrooms}} @if($bedrooms>1) {{__('recámaras')}}@else {{__('recámara')}}@endif, {{$unit->unitType->bathrooms}} 
                                {{__('baños y un área total de')}} {{$unit->total_const}} {{__('m²')}}, {{__('ubicado en el piso')}} {{$unit->floor}} {{__('de la Torre')}} {{$unit->tower_name}}.
                            </p>

                            <div class="d-flex fs-5 justify-content-center fw-light">
                                <div class="me-3">
                                    <i class="fa-solid fa-bed"></i> {{$bedrooms}}
                                </div>

                                <div class="me-3">
                                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                                </div>

                                <div>
                                    <i class="fa-solid fa-house"></i> {{number_format($unit->total_const, 2)}} {{__('m²')}}
                                </div>
                            </div>
                        </div>

                    </div>

                </a> 
            @endforeach

            <div class="col-12 col-lg-9 mt-5">
                {{ ($units->links()) }}
            </div>        
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

                <a href="{{ route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type, 'tower'=>$unit->tower_name, 'contact' => request()->query('contact') ] ) }}" class="col-12 col-lg-4 text-decoration-none mb-3 mb-lg-5">

                    <div class="card w-100 shadow-4 rounded-0 position-relative">

                        <div class="position-absolute top-0 start-0 badge {{$status_class}} rounded-pill fw-light mt-4 ms-3 fs-6 border-sand">
                            {{__($unit->status)}}
                        </div>
                        
                        @if ( $unit->status != 'Vendida' and $unit->price != 0)
                            <div class="position-absolute top-0 end-0 bg-blurred m-3 text-sand py-1 px-2 fs-5 border-gradient border-sand">
                                <strong>${{ number_format($unit->price) }} </strong>
                                <span class="fw-light">{{$unit->currency}}</span>
                            </div>
                        @endif

                        <img src="{{ $portrait }}" class="w-100" alt="{{$unit->unitType->property_type}} {{$unit->name}}" style="height: 300px; object-fit:cover;">

                        <div class="card-body text-green">
                            <h3 class="card-title fs-5">{{__($unit->unitType->property_type)}} {{$unit->name}} - {{__('Torre')}} {{$unit->tower_name}}</h3>
                            <p class="card-text fs-7">
                                {{__($unit->unitType->property_type)}} {{__('con')}} {{$unit->unitType->bedrooms}} {{__('recámaras')}}, {{$unit->unitType->bathrooms}} {{__('baños y un área total de')}} 
                                {{$unit->total_const}} {{__('m²')}}, {{__('ubicado en el piso')}} {{$unit->floor}} {{__('de la Torre')}} {{$unit->tower_name}}.
                            </p>

                            <div class="d-flex fs-5 justify-content-center fw-light">
                                <div class="me-3">
                                    <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}}
                                </div>

                                <div class="me-3">
                                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                                </div>

                                <div>
                                    <i class="fa-solid fa-house"></i> {{number_format($unit->total_const, 2)}} {{__('m²')}}
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
