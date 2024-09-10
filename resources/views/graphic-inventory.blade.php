@extends('components.base')

@section('titles')
    <title>
        {{__('Inventario gráfico de Condominios y Villas en Venta')}} - Virēo Living, El Tigre
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
                    {{ __('Condominios y Villas Disponibles') }}
                </h1>
                
            </div>
        </div>

    </div>

    @include('components.simbology')

    @include('components.searchform')

    
    <div class="container input-group justify-content-end mb-4 text-end">
        <a href="{{route('graphic.inventory', request()->query() )}}" class="btn btn-outline-green rounded-end-0 rounded-start-circle"><i class="fa-solid fa-border-all"></i></a>
        <a href="{{route('inventory', request()->query() )}}" class="btn btn-outline-green rounded-start-0 rounded-end-circle"><i class="fa-solid fa-list"></i></a>
    </div>

    {{-- Torre A --}}
    <h2 class="container">{{__('Torre')}} A</h2>

    <div class="container position-relative mb-5 px-2 px-lg-0">

        <img src="{{asset('img/torre-a.png')}}" alt="Torre A - Virēo Living" class="w-100">

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="0 0 1597 294">

            
            {{-- Lounge Lobby --}}
            <rect class="lobby-shape" x="645" y="97" height="200" width="210"></rect>
            
            <text x="670" y="200" font-size="26" font-weight="bold" fill="#5B5942" class="fw-light">

                <tspan class="text-decoration-underline">
                    {{__('Lounge Lobby')}}
                </tspan>
                
            </text>
            

            @foreach ($towerA_units as $unit )

                <a href="#unit-modal-{{$unit->id}}" data-bs-toggle="modal" data-bs-target="#unit-modal-{{$unit->id}}" class="unit-square text-decoration-none position-relative">
                    
                    <rect class="unit-{{strtolower($unit->status)}}" x="{{ $unit->shape->rect_x ?? '0' }}" y="{{ $unit->shape->rect_y ?? '0' }}" height="{{ $unit->shape->height ?? '0' }}" width="{{ $unit->shape->width ?? '0'}}"></rect>
                    
                    <text x="{{$unit->shape->text_x ?? 0;}}"
                        y="{{$unit->shape->text_y ?? 0; }}"
                        font-size="24" font-weight="bold" fill="#fff" class="fw-light">

                        <tspan class="text-decoration-underline">{{$unit->name}}</tspan>

                        @php
                            $type_x = ($unit->shape->text_x ?? 0) - 25;
                        @endphp

                        <tspan x="{{$type_x}}" dy="1.3em" font-size="16" font-weight="light">
                            {{ $unit->unitType->bedrooms }}
                            @if($unit->unitType->flexrooms > 0).5 @endif
                            {{__('REC')}}
                            + {{ $unit->unitType->bathrooms }} {{__('BA')}}
                        </tspan>
                        
                    </text>
                    
                </a>
            @endforeach
        </svg>

    </div>

    {{-- Torre B --}}
    <h2 class="container">{{__('Torre')}} B</h2>
    <div class="container position-relative mb-6 px-2 px-lg-0">

        <img src="{{asset('img/torre-b.png')}}" alt="Torre A - Virēo Living" class="w-100">

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="0 0 1597 277">
            
            {{-- Lobby --}}
            <rect class="lobby-shape" x="576" y="185" height="91" width="125"></rect>
            
            <text x="605" y="235" font-size="26" font-weight="bold" fill="#5B5942" class="fw-light">

                <tspan class="text-decoration-underline">
                    {{__('Lobby')}}
                </tspan>
                
            </text>

            @foreach ($towerB_units as $unit )

                <a href="#unit-modal-{{$unit->id}}" data-bs-toggle="modal" data-bs-target="#unit-modal-{{$unit->id}}" class="unit-square text-decoration-none position-relative">
                        
                    <rect class="unit-{{strtolower($unit->status)}}" x="{{ $unit->shape->rect_x ?? '0' }}" y="{{ $unit->shape->rect_y ?? '0' }}" height="{{ $unit->shape->height ?? '0' }}" width="{{ $unit->shape->width ?? '0'}}"></rect>
                    
                    <text x="{{$unit->shape->text_x ?? 0;}}"
                        y="{{$unit->shape->text_y ?? 0; }}"
                        font-size="20" font-weight="bold" fill="#fff" class="fw-light">

                        <tspan class="text-decoration-underline">{{$unit->name}}</tspan>

                        @php
                            if ( $unit->unit_type_id == 4 or $unit->unit_type_id == 8 ) {
                                $type_x = ($unit->shape->text_x ?? 0) - 18;
                            } else {
                                $type_x = ($unit->shape->text_x ?? 0) - 25;
                            }
                            
                        @endphp

                        <tspan x="{{$type_x}}" dy="1.3em" font-size="14" font-weight="light">
                            {{ $unit->unitType->bedrooms }}
                            @if($unit->unitType->flexrooms > 0).5 @endif
                            {{__('REC')}}
                            + {{ $unit->unitType->bathrooms }} {{__('BA')}}
                        </tspan>
                        
                    </text>
                    
                </a>

            @endforeach
        </svg>

    </div>

    
    {{-- Modal --}}
    @foreach ($units as $unit)
        <div class="modal fade" id="unit-modal-{{$unit->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content bg-sand">

                    <div class="modal-header">
                        <div class="modal-title fs-4 ff-forum">{{__('Unidad')}} {{$unit->name}} {{__('Torre')}} {{$unit->tower_name}}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                        @php
                            $blueprints = $unit->unitType->getMedia('blueprints');
                        @endphp
                        @if ( isset($blueprints[0]) )
                            <img src="{{ $blueprints[0]->getUrl('medium') }}" alt="{{__('Unidad')}} {{$unit->name}} {{__('Torre')}} {{$unit->tower_name}}" class="w-100">
                        @endif

                        <div class="d-flex justify-content-center fs-5 mt-4">

                            <div class="me-3">
                                <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}}@if($unit->unitType->flexrooms == 1).5 @endif
                            </div>
            
                            <div class="me-3">
                                <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                            </div>
                            
                            <div class="me-3">
                                <i class="fa-solid fa-house"></i> {{$unit->total_const}} {{__('m²')}}
                            </div>
                        </div>

                        <div class="fw-light fs-3 ff-forum">
                            ${{ number_format($unit->price) }} {{$unit->currency}}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-green" data-bs-dismiss="modal">{{__('Cerrar')}}</button>
                        <a href="{{route('unit', ['name'=>$unit->name, 'property_type'=>$unit->unitType->property_type, 'tower'=>$unit->tower_name, 'contact' => request()->query('contact') ] )}}" class="btn btn-green">{{__('Más información')}}</a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach


    @include('components.contact-form')

@endsection