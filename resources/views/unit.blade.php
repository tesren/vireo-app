@extends('components.base')

@section('titles')
    <title>{{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre</title>
    <meta name="description" content="{{__('Descubre este exclusivo condominio en venta en El Tigre dentro de Virēo Living. Este espacioso condominio de')}} {{$unit->total_const}}m² {{__('ofrece')}} {{$unit->unitType->bedrooms}} {{__('recámaras y')}} {{$unit->unitType->bathrooms}} {{__('baños, perfecto para una vida moderna y relajada. Situado en el nivel')}} {{ $unit->floor }} {{__('de la Torre')}} {{ $unit->tower_name }}">
@endsection

@section('content')

    @php
        $images = $unit->unitType->getMedia('gallery');
        
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

    {{-- Inicio --}}
    <div class="position-relative mb-6">

        <div class="row">
            <div class="col-12 col-lg-8 px-0">
                <img src="{{ $images[0]->getUrl('large') }}" alt="{{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" class="w-100" style="height: 100vh; object-fit:cover;">
            </div>

            <div class="col-12 col-lg-4 pe-0">
                <img src="{{ $images[1]->getUrl('large') }}" alt="{{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" class="w-100" style="height: 100vh; object-fit:cover;">
            </div>
        </div>
        

        <div class="fondo-oscuro"></div>

        <div class="row justify-content-center justify-content-lg-start position-absolute top-0 left-0 h-100 z-3">
            <div class="col-11 col-lg-8 text-center text-sand align-self-center mt-6">

                <h1 class="fs-1 mb-4 ">
                    {{ __($unit->unitType->property_type) }} {{$unit->name}}
                    <hr class="sand-hr my-2 w-50 mx-auto">
                    <div class="fs-3">
                        {{ $unit->unitType->bedrooms }} {{__('Recámaras')}}
                        @if($unit->unitType->flexrooms > 0) + Flex @endif
                        + {{ $unit->unitType->bathrooms }} {{__('Baños')}}
                    </div>
                </h1>
                
            </div>
        </div>

    </div>

    {{-- Detalles --}}
    <div class="row justify-content-evenly mb-6">
        <div class="col-12 col-lg-5 mb-5 mb-lg-0">

            <h2 class="fs-2">{{ __($unit->unitType->property_type) }} {{$unit->name}} - {{__('Torre')}} {{$unit->tower_name}}</h2>
            <p class="fs-5">
                {{__('Descubre este exclusivo condominio en venta en El Tigre dentro de Virēo Living. Este espacioso condominio de')}} {{$unit->total_const}}m² 
                {{__('ofrece')}} {{$unit->unitType->bedrooms}} {{__('recámaras y')}} {{$unit->unitType->bathrooms}} {{__('baños, perfecto para una vida moderna y relajada. Situado en el nivel')}} 
                {{ $unit->floor }} {{__('de la Torre')}} {{ $unit->tower_name }}.
            </p>

            <div class="d-flex fs-6 mt-4">

                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Recámaras')}}">
                    <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}}@if($unit->unitType->flexrooms == 1).5 @endif
                </div>

                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Baños')}}">
                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                </div>

                @isset($unit->parking_area)
                    <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Estacionamiento')}}">
                        <i class="fa-solid fa-car"></i> {{$unit->parking_area}} m²
                    </div>
                @endisset
                
                @isset($unit->garden_area)
                    <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Jardín')}}">
                        <i class="fa-solid fa-seedling"></i> {{$unit->garden_area}} m²
                    </div>
                @endisset

                
                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Área total')}}">
                    <i class="fa-solid fa-house"></i> {{$unit->total_const}} m²
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-4 text-center align-self-center">

            <div class="badge {{$status_class}} rounded-pill fw-light fs-6">
                {{$unit->status}}
            </div>

            <div class="fs-1 my-2">${{ number_format($unit->price) }} {{$unit->currency}}</div>

            <a href="#contact" class="btn btn-green rounded-0 fs-5 px-5 fw-light shadow-4" style="letter-spacing: 2px;">
                {{__('Contáctanos')}}
            </a>

        </div>
    </div>

    {{-- Planes de pago --}}
    <div class="row bg-green py-5 justify-content-evenly">

        <div class="col-12 col-lg-5 px-0">

            
            <div class="bg-sand px-0 pb-1">
                <ul class="nav nav-pills px-3 px-lg-5 py-4" id="pills-tab" role="tablist">
    
                    <li class="me-4">
                        <h3>{{__('Planes de Pago')}}</h3>
                    </li>
    
                    @php
                        $i = 0;
                    @endphp
    
                    @foreach ($unit->paymentPlans as $plan)
    
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill @if($i==0) active @endif" id="pills-{{$plan->id}}-tab" data-bs-toggle="pill" data-bs-target="#pills-plan-{{$plan->id}}" type="button" role="tab">
                                @if (app()->getLocale() == 'en')
                                    {{$plan->name_en}}
                                @else
                                    {{$plan->name}}
                                @endif
                            </button>
                        </li>
    
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    
                </ul>
    
                <div class="tab-content" id="pills-tabContent">
                    @php $i = 0; @endphp
                    @foreach ($unit->paymentPlans as $plan)
    
                        @php
                            if($plan->discount > 0){
                                $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                            }else{
                                $final_price = $unit->price;
                            }
                        @endphp 
    
                        <div class="tab-pane fade @if($i==0) show active @endif" id="pills-plan-{{$plan->id}}" role="tabpanel" tabindex="0">
                            
                            <div class="py-4 bg-blue text-center">
                                <div>{{__('Precio Final')}}</div>
                                <div class="fs-2">${{ number_format($final_price) }} {{ $unit->currency }}</div>
                            </div>
    
                            @isset($plan->discount)
                                <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">{{__('Precio de lista')}}</div>
                                    <div class="text-decoration-line-through fs-4">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                            @isset($plan->discount)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">{{__('Descuento')}} ({{$plan->discount}}%)</div>
                                    <div class="fs-4">${{ number_format( $unit->price * ($plan->discount/100) ) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                            <hr class="green-hr">
    
                            @isset($plan->down_payment)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">
                                        {{__('Enganche')}} ({{$plan->down_payment}}%)
                                        <div class="fs-7 fw-light">{{__('A la firma del contrato de promesa de compra-venta')}}.</div>
                                    </div>
                                    <div class="fs-4">${{ number_format( $final_price * ($plan->down_payment/100) ) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                            @isset($plan->second_payment)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">
                                        {{__('Segundo pago')}} ({{$plan->second_payment}}%)
                                        <div class="fs-7 fw-light">{{__('Sesenta días después del enganche')}}.</div>
                                    </div>
                                    <div class="fs-4">${{ number_format( $final_price * ($plan->second_payment/100) ) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
                            
                            @isset($plan->months_percent)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">{{__('Mensualidades')}} ({{$plan->months_percent}}%)</div>
                                    <div class="fs-4">${{ number_format( $final_price * ($plan->months_percent/100) ) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                            @isset($plan->closing_payment)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">
                                        {{__('Pago Final')}} ({{$plan->closing_payment}}%)
                                        <div class="fs-7 fw-light">{{__('A la entrega física de la propiedad')}}.</div>
                                    </div>
                                    <div class="fs-4">${{ number_format( $final_price * ($plan->closing_payment/100) ) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                        </div>
    
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
            
            <div class="bg-green mt-2">
                <ul class="fs-7 fw-light">
                    <li>
                        {{__('El contrato de promesa de compra-venta tendrá que firmarse en un plazo máximo de diez días a partir de la firma de la solicitud de compra.')}}
                    </li>

                    <li>
                        {{__('En caso de no proceder con la compra de la unidad en el tiempo establecido (firma de contrato y pago de enganche), la unidad quedará disponible.')}}
                    </li>

                    <li>{{__('Precios, descuentos y condiciones de pago sujetos a cambios sin previo aviso.')}}</li>
                </ul>
            </div>

        </div>

    </div>

    @include('components.contact-form')

@endsection