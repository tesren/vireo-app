@extends('components.base')

@section('titles')
    <title>{{ __($unit->unitType->property_type) }} {{$unit->name}} - Virēo Living, El Tigre</title>
    <meta name="description" content="@if ( $unit->unitType->property_type == 'Villa' ) {{__('Descubre esta exclusiva villa en venta en El Tigre dentro de Virēo Living. Esta espaciosa villa de')}} @else {{__('Descubre este exclusivo condominio en venta en El Tigre dentro de Virēo Living. Este espacioso condominio de')}} @endif {{$unit->total_const}}{{__('m²')}} {{__('ofrece')}} {{$unit->unitType->bedrooms}} {{__('recámaras y')}} {{$unit->unitType->bathrooms}} {{__('baños, perfecto para una vida moderna y relajada. Situado en el nivel')}} {{ $unit->floor }} {{__('de la Torre')}} {{ $unit->tower_name }}">
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
                <img src="{{ $images[0]->getUrl('medium') }}" alt="{{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" class="w-100" style="height: 100vh; object-fit:cover;">
            </div>

            <div class="col-12 col-lg-4 pe-0 d-none d-lg-block">
                @if ( isset($images[1]) )
                    <img src="{{ $images[1]->getUrl('medium') }}" alt="{{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" class="w-100" style="height: 100vh; object-fit:cover;">
                @else
                    <img src="{{ asset('/img/villa-interior-exterior.webp') }}" alt="{{$unit->name}} - Virēo Living, El Tigre" class="w-100" style="height: 100vh; object-fit:cover;">
                @endif
            </div>
        </div>
        

        <div class="fondo-oscuro"></div>

        <div class="row justify-content-center justify-content-lg-start position-absolute top-0 left-0 h-100 z-3">
            <div class="col-11 col-lg-8 text-center text-sand align-self-end align-self-lg-center mt-6">

                @if ($unit->status == 'Vendida')
                    <div class="badge bg-danger fs-4 fw-light mb-3 rounded-pill">
                        {{__('Vendida')}}
                    </div>
                @endif

                <h1 class="fs-1 mb-4 ">
                    {{ __($unit->unitType->property_type) }} {{$unit->name}}
                    <hr class="sand-hr my-2 w-50 mx-auto">

                    @php $bedrooms = $unit->unitType->bedrooms @endphp

                    <div class="fs-3">
                        {{ $bedrooms }} @if($bedrooms > 1) {{__('Recámaras')}}@else {{__('Recámara')}}@endif
                        @if($unit->unitType->flexrooms > 0) + Flex @endif
                        + {{ $unit->unitType->bathrooms }} {{__('Baños')}}
                    </div>
                </h1>

                @isset($unit->youtube_link)
                    <a href="{{$unit->youtube_link}}" data-fancybox="unit-view" class="btn btn-blurred fs-4 rounded-0 px-4 py-2 mb-4 mb-lg-0">
                        <i class="fa-solid fa-play"></i> {{__('Vista de la unidad')}}
                    </a>
                @endisset
                
                
            </div>

            <div class="col-12 col-lg-4 align-self-start align-self-lg-center text-center mt-0 mt-lg-5">

                <a href="#gallery-1" class="btn btn-blurred fs-4 rounded-0 px-4 py-2">
                    <i class="fa-regular fa-image"></i> {{__('Galería')}}
                </a>

            </div>
        </div>

    </div>

    @foreach ($images as $image)
        <img src="{{ $image->getUrl('large') }}" alt="{{__('Galería de')}} {{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" data-fancybox="gallery" class="d-none">
    @endforeach

    {{-- Detalles --}}
    <div class="row justify-content-evenly mb-6">
        <div class="col-12 col-lg-5 mb-5 mb-lg-0">

            <h2 class="fs-2">{{ __($unit->unitType->property_type) }} {{$unit->name}} - {{__('Torre')}} {{$unit->tower_name}}</h2>
            <p class="fs-5">

                @if ( $unit->unitType->property_type == 'Villa' )
                    {{__('Descubre esta exclusiva villa en venta en El Tigre dentro de Virēo Living. Esta espaciosa villa de')}} 
                @else
                    {{__('Descubre este exclusivo condominio en venta en El Tigre dentro de Virēo Living. Este espacioso condominio de')}} 
                @endif

                {{$unit->total_const}} {{__('m²')}} 
                {{__('ofrece')}} {{$bedrooms}} @if($bedrooms > 1) {{__('recámaras y')}}@else {{__('recámara y')}}@endif 
                {{$unit->unitType->bathrooms}} {{__('baños, perfecto para una vida moderna y relajada. Situado en el nivel')}} 
                {{ $unit->floor }} {{__('de la Torre')}} {{ $unit->tower_name }}.
            </p>

            <div class="d-flex justify-content-center justify-content-lg-start fs-5 mt-4">

                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Recámaras')}}">
                    <i class="fa-solid fa-bed"></i> {{$bedrooms}}@if($unit->unitType->flexrooms == 1).5 @endif
                </div>

                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Baños')}}">
                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}}
                </div>
                
                <div class="me-3" data-bs-toggle="tooltip" data-bs-title="{{__('Área total')}}">
                    <i class="fa-solid fa-house"></i> {{$unit->total_const}} {{__('m²')}}
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-4 text-center align-self-center">

            @if ($unit->status != 'Vendida' and $unit->price != 0)
                <div class="badge {{$status_class}} rounded-pill fw-light fs-6">
                    {{__($unit->status)}}
                </div>

                <div class="fs-1 my-2">${{ number_format($unit->price) }} {{$unit->currency}}</div>

                <a href="#contact" class="btn btn-green rounded-0 fs-5 px-5 fw-light shadow-4" style="letter-spacing: 2px;">
                    {{__('Contáctanos')}}
                </a>
            @endif

        </div>
    </div>

    <div class="row bg-green py-5 justify-content-evenly">

        {{-- Ubicacion en planta --}}
        @if ($unit->location_img_path)
            <div class="col-12 col-lg-5 p-4 p-lg-5 order-2 order-lg-1 bg-white align-self-center">

                <h2 class="text-green mb-4">{{__('Ubicación en planta')}}</h2>
                <img src="{{asset( 'media/'.$unit->location_img_path )}}" alt="{{ __($unit->unitType->property_type) }} {{$unit->name}} - Virēo Living" class="w-100" data-fancybox="location">

            </div>
        @endif

        {{-- Planos --}}
        <div class="col-12 col-lg-5 align-self-center order-1 order-lg-2">

            @php
                $blueprints = $unit->unitType->getMedia('blueprints');
            @endphp

            @if ( count($blueprints) > 0 )

                <div id="carouselBlueprints" class="carousel slide">

                    <div class="carousel-inner">

                        @php $i=0; @endphp
                        @foreach ($blueprints as $blueprint)
                            <div class="carousel-item @if($i==0) active @endif">
                                <img src="{{ $blueprint->getUrl('large') }}" class="d-block w-100" alt="{{'Planos'}} {{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" data-fancybox="blueprint">
                            </div>
                            @php $i++; @endphp
                        @endforeach

                        @isset($unit->blueprint_path)
                            <div class="carousel-item">
                                <img src="{{ asset('media/'.$unit->blueprint_path) }}" class="d-block col-12 col-lg-7 col-xxl-6 mx-auto" alt="{{'Planos'}} {{ $unit->unitType->property_type }} {{$unit->name}} - Virēo Living, El Tigre" data-fancybox="blueprint">
                            </div>
                        @endisset
                        
                    </div>

                    @if( count($blueprints) > 1 or isset($unit->blueprint_path) )
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBlueprints" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselBlueprints" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif

                </div>
                
            @endif


            <h4 class="text-center">{{__('Construcción total')}}: {{$unit->total_const}} {{__('m²')}}</h4>
            <table class="table table-sand">
                <tbody>

                    <tr>
                        <td>{{__('Interior')}}</td>
                        <td>{{$unit->interior_const}} {{__('m²')}}</td>
                    </tr>

                    <tr>
                        <td>{{__('Terraza')}}</td>
                        <td>{{$unit->exterior_const}} {{__('m²')}}</td>
                    </tr>

                    @isset($unit->extra_exterior_const)
                        <tr>
                            <td>{{__('Terraza Extra')}}</td>
                            <td>{{$unit->extra_exterior_const}} {{__('m²')}}</td>
                        </tr>
                    @endisset

                    <tr>
                        <td>{{__('Estacionamiento')}}</td>
                        <td>{{ number_format($unit->parking_area, 2) }} {{__('m²')}}</td>
                    </tr>

                    @isset($unit->storage_area)
                        <tr>
                            <td>{{__('Bodega')}}</td>
                            <td>{{$unit->storage_area}} {{__('m²')}}</td>
                        </tr>
                    @endisset

                    @isset($unit->garden_area)
                        <tr>
                            <td>{{__('Jardín')}}</td>
                            <td>{{$unit->garden_area}} {{__('m²')}}</td>
                        </tr>
                    @endisset

                </tbody>

            </table>
        </div>

    </div>

    <div class="row bg-green py-5 justify-content-evenly">

        {{-- Planes de pago --}}
        @if( $unit->status != 'Vendida' and $unit->price != 0)
            <div class="col-12 col-lg-5 px-2 px-lg-0 order-2 order-lg-1">

                
                <div class="bg-sand px-0 shadow-4">

                    <h3 class="fs-4 mb-3 text-center d-block d-lg-none pt-4">{{__('Planes de Pago')}}</h3>

                    <ul class="position-relative nav nav-pills px-3 px-lg-5 pb-4 pt-0 pt-lg-4 justify-content-center justify-content-lg-start z-3" id="pills-tab" role="tablist">
        
                        <li class="me-3 d-none d-lg-flex">
                            <h3 class="fs-4 mb-0 align-self-center">{{__('Planes de Pago')}}</h3>
                        </li>
        
                        @php
                            $i = 0;
                        @endphp
        
                        @foreach ($unit->paymentPlans as $plan)
        
                            <li class="nav-item me-1" role="presentation">
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
        
                    <div class="tab-content position-relative" id="pills-tabContent">

                        <img src="{{ asset('img/background-plans.webp') }}" alt="" class="w-100 position-absolute end-0 bottom-0" style="height:120%; z-index:1; opacity:0.3;">

                        @php $i = 0; @endphp
                        @foreach ($unit->paymentPlans as $plan)
        
                            @php
                                if($plan->discount > 0){
                                    $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                                }else{
                                    $final_price = $unit->price;
                                }

                                $today = \Carbon\Carbon::now();

                                if($plan->delivery_date){
                                    $delivery_date = \Carbon\Carbon::parse($plan->delivery_date);
                                    $months_till_delivery = $today->diffInMonths($delivery_date);
                                }
                                else{
                                    $months_till_delivery = $plan->months_amount ?? 0;
                                }

                            @endphp 
        
                            <div class="tab-pane position-relative pb-3 fade @if($i==0) show active @endif" id="pills-plan-{{$plan->id}}" role="tabpanel" tabindex="0" style="z-index: 2;">
                                
                                <div class="py-3 bg-blue text-center">
                                    <div>{{__('Precio de lista')}}</div>
                                    <div class="fs-3">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                </div>
        
                                @isset($plan->discount)
                                    <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-plans">{{__('Descuento')}} ({{$plan->discount}}%)</div>
                                        <div class="fs-plans">${{ number_format( $unit->price * ($plan->discount/100) ) }} {{ $unit->currency }}</div>
                                    </div>

                                    <hr class="green-hr">
                                @endisset
        
                                @isset($plan->down_payment)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-plans col-6 px-0">
                                            {{__('Enganche')}} ({{$plan->down_payment}}%)
                                        </div>
                                        <div class="fs-plans col-6 text-end px-0">${{ number_format( $final_price * ($plan->down_payment/100) ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 fw-light col-12 px-0">{{__('A la firma del contrato de promesa de compra-venta')}}.</div>
                                    </div>
                                @endisset
        
                                @isset($plan->second_payment)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-plans col-7 px-0">
                                            {{__('Segundo pago')}} ({{$plan->second_payment}}%)
                                        </div>
                                        <div class="fs-plans col-5 px-0 text-end">${{ number_format( $final_price * ($plan->second_payment/100) ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 fw-light col-12 px-0">{{__('Sesenta días después del enganche')}}.</div>
                                    </div>
                                @endisset
                                
                                @isset($plan->months_percent)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-plans col-6 px-0">
                                            {{ $months_till_delivery == 0 ? '' : $months_till_delivery }} {{__('Mensualidades')}} ({{$plan->months_percent}}%)
                                        </div>

                                        <div class="fs-plans text-end col-6 px-0">
                                            ${{ number_format( $final_price * ($plan->months_percent/100) ) }} {{ $unit->currency }}
                                        </div>

                                        <div class="fs-7 fw-light col-12 px-0">
                                            @if ($plan->during_const)
                                                {{__('Pagos mensuales durante la construcción')}}.
                                            @endif

                                            @if($months_till_delivery > 1)
                                                @php
                                                    $each_month_amount = ($final_price * ($plan->months_percent/100)) / $months_till_delivery;
                                                @endphp
                                                <span class="ms-1">{{ $months_till_delivery }} {{__('Pagos de') }} ${{ number_format($each_month_amount) }} {{ $unit->currency }} {{__('cada uno')}}.</span>
                                            @endif
                                        </div>

                                    </div>
                                @endisset
        
                                @isset($plan->closing_payment)
                                    <div class="row justify-content-between px-2 px-lg-4 fw-light">
                                        <div class="fs-plans col-6 px-0">
                                            {{__('Pago Final')}} ({{$plan->closing_payment}}%)
                                        </div>
                                        <div class="fs-plans col-6 text-end px-0">${{ number_format( $final_price * ($plan->closing_payment/100) ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 fw-light col-12 px-0">{{__('A la entrega física de la propiedad')}}.</div>
                                    </div>
                                @endisset

                                <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-bold">
                                    <div class="fs-plans">{{__('Precio final')}}</div>
                                    <div class="fs-plans">${{ number_format($final_price) }} {{ $unit->currency }}</div>
                                </div>
        
                            </div>
        
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                
                <div class="bg-green mt-2">
                    <ul class="fs-7 fw-light">
                        <li class="mb-1">
                            {{__('El contrato de promesa de compra-venta tendrá que firmarse en un plazo máximo de diez días a partir de la firma de la solicitud de compra.')}}
                        </li>

                        <li class="mb-1">
                            {{__('En caso de no proceder con la compra de la unidad en el tiempo establecido (firma de contrato y pago de enganche), la unidad quedará disponible.')}}
                        </li>

                        <li class="mb-1">{{__('Precios, descuentos y condiciones de pago sujetos a cambios sin previo aviso.')}}</li>
                    </ul>
                </div>

            </div>
        @endif

        {{-- Ubicacion en piso --}}
        <div class="col-12 col-lg-5 align-self-center order-1 order-lg-2 mb-5 mb-lg-0">
            <h4 class="fs-2 mb-3 text-center text-lg-start pt-4">{{__('Ubicación en Torre')}} {{$unit->tower_name}}</h4>

            <div class="position-relative mb-5">

                @if ($unit->tower_name == 'A')
                    <img src="{{asset('img/torre-a.jpg')}}" alt="Torre A - Virēo Living" class="rounded-3 shadow w-100">
                @elseif ($unit->tower_name == 'B')
                    <img src="{{asset('img/torre-b.jpg')}}" alt="Torre A - Virēo Living" class=" rounded-3 shadow w-100">
                @endif


                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0" viewBox="{{ $unit->tower_name == 'A' ? '0 0 460.8 259.2' : '0 0 1920 991' }}">
                    
                    @if (isset($unit->shape->form_type) && $unit->shape->form_type == 'polygon')
                        <polygon class="unit-{{strtolower($unit->status)}}" points="{{$unit->shape->points ?? ''}}"></polygon>
                    @else
                        <rect class="unit-{{strtolower($unit->status)}}" x="{{ $unit->shape->rect_x ?? '0' }}" y="{{ $unit->shape->rect_y ?? '0' }}" height="{{ $unit->shape->height ?? '0' }}" width="{{ $unit->shape->width ?? '0'}}"></rect>
                    @endif
                    
                    <text x="{{$unit->shape->text_x ?? 0;}}"
                        y="{{$unit->shape->text_y ?? 0; }}"
                        font-size="{{ $unit->tower_name == 'A' ? '6' : '18' }}" font-weight="bold" fill="#fff" class="fw-light">

                        <tspan class="text-decoration-underline">{{$unit->name}}</tspan>
                        
                    </text>

                </svg>
            </div>

            <h4 class="fs-2">{{__('Amenidades Comunes')}}</h4>
            <p class="fs-6 mb-4">{{__('Disfruta de las amenidades exclusivas, que incluyen terraza pergolada, alberca de adultos y niños, pista de jogging, golf lounge y lobby. Además de las amenidades de primer nivel que ofrece la membresía social de El Tigre Golf & Country Club, así como acceso al club de playa.')}}</p>

            <div class="row justify-content-evenly text-center fs-5 fw-light">
                <div class="col-6 col-lg-3 mb-3">
                    <i class="fa-solid fa-water-ladder"></i> {{__('Alberca')}}
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <i class="fa-solid fa-golf-ball-tee"></i> {{__('Golf Lounge')}}
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <i class="fa-solid fa-person-running"></i> {{__('Pista de Jogging')}}
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <i class="fa-solid fa-bell-concierge"></i> {{__('Lobby Principal')}}
                </div>
                {{-- <div class="col-12 col-lg-5 mb-3">
                    <i class="fa-solid fa-people-roof"></i> {{__('Terraza pergolada')}}
                </div> --}}
            </div>

        </div>

    </div>

    <img src="{{asset('img/details.svg')}}" alt="" class="w-100 d-none d-lg-block" style="height: 100px; object-fit:cover;">

    @include('components.contact-form')

@endsection