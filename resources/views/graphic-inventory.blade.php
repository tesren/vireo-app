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


    {{-- Torre B --}}
    <div class="col-12 col-lg-11 col-xxl-10 mx-auto mb-6 px-2 px-lg-0">
        <h2 class="">{{__('Torre')}} B</h2>

        <div class="position-relative svg-container" style="max-width:100%;">
            <img src="{{asset('img/torre-b.jpg')}}" alt="Torre A - Virēo Living" class=" rounded-3 shadow">
    
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="0 0 1920 991">
    
                @foreach ($towerB_units as $unit )
    
                    <a href="#unit-modal-{{$unit->id}}" data-bs-toggle="modal" data-bs-target="#unit-modal-{{$unit->id}}" class="unit-square text-decoration-none position-relative">
                            
                        @if (isset($unit->shape->form_type) && $unit->shape->form_type == 'polygon')
                            <polygon class="unit-{{strtolower($unit->status)}}" points="{{$unit->shape->points ?? ''}}"></polygon>
                        @else
                            <rect class="unit-{{strtolower($unit->status)}}" x="{{ $unit->shape->rect_x ?? '0' }}" y="{{ $unit->shape->rect_y ?? '0' }}" height="{{ $unit->shape->height ?? '0' }}" width="{{ $unit->shape->width ?? '0'}}"></rect>
                        @endif
                        
                        <text x="{{$unit->shape->text_x ?? 0;}}"
                            y="{{$unit->shape->text_y ?? 0; }}"
                            font-size="17" font-weight="bold" fill="#fff" class="fw-light">
    
                            <tspan class="text-decoration-underline">{{$unit->name}}</tspan>
    
                            @php
                                if ( $unit->unit_type_id == 4 or $unit->unit_type_id == 8 ) {
                                    $type_x = ($unit->shape->text_x ?? 0) - 12;
                                } else {
                                    $type_x = ($unit->shape->text_x ?? 0) - 18;
                                }
                                
                            @endphp
    
                            <tspan x="{{$type_x}}" dy="1.3em" font-size="9" font-weight="light">
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

        <div class="mt-4 fs-2 ff-forum">{{__('Albercas y área común')}}</div>


    </div>

    {{-- Torre A --}}
    <div class="col-12 col-lg-11 col-xxl-10 mx-auto mb-6 px-2 px-lg-0">
        <h2 class="">{{__('Torre')}} A</h2>

        <div class="position-relative svg-container" style="max-width:100%;">
            <img src="{{asset('img/torre-a.jpg')}}" alt="Torre A - Virēo Living" class="rounded-3 shadow">
    
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="0 0 460.8 259.2">
    
    
                @foreach ($towerA_units as $unit )
    
                    <a href="#unit-modal-{{$unit->id}}" data-bs-toggle="modal" data-bs-target="#unit-modal-{{$unit->id}}" class="unit-square text-decoration-none position-relative">
                        
                        @if (isset($unit->shape->form_type) && $unit->shape->form_type == 'polygon')
                            <polygon class="unit-{{strtolower($unit->status)}}" points="{{$unit->shape->points ?? ''}}"></polygon>
                        @else
                            <rect class="unit-{{strtolower($unit->status)}}" x="{{ $unit->shape->rect_x ?? '0' }}" y="{{ $unit->shape->rect_y ?? '0' }}" height="{{ $unit->shape->height ?? '0' }}" width="{{ $unit->shape->width ?? '0'}}"></rect>
                        @endif
                        
                        <text x="{{$unit->shape->text_x ?? 0;}}"
                            y="{{$unit->shape->text_y ?? 0; }}"
                            font-size="5" font-weight="bold" fill="#fff" class="fw-light">
    
                            <tspan class="text-decoration-underline">{{$unit->name}}</tspan>
    
                            @php
                                $type_x = ($unit->shape->text_x ?? 0) - 5;
                            @endphp
    
                            <tspan x="{{$type_x}}" dy="1.3em" font-size="3" font-weight="light">
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

        <div class="mt-4 fs-2 ff-forum">{{__('Campo de Golf')}}</div>

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

                        @if ( $unit->status != 'Vendida' and $unit->price != 0)
                            <div class="fw-light fs-3 ff-forum">
                                ${{ number_format($unit->price) }} {{$unit->currency}}
                            </div>
                        @endif
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