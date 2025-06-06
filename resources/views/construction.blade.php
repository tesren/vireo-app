@extends('components.base')

@section('titles')
    <title>{{__('Avances de Obra')}} - Virēo Living, El Tigre</title>
    <meta name="description" content="{{__('Avances mensuales de obra de Virēo Living en Nuevo Vallarta, Nayarit! Descubre nuestro progreso a través de imágenes y videos actualizados regularmente. Desde la construcción de nuestras exclusivas amenidades hasta la evolución de las residencias, te invitamos a seguir de cerca nuestro desarrollo. Sumérgete en la experiencia Virēo Living y vislumbra tu futuro hogar en uno de los destinos más privilegiados de México. ¡No te pierdas ningún detalle de nuestra transformación!')}}">
    <meta property="og:image"       content="{{asset('media/'.$latest_img)}}" />
    <meta property="og:image:secure_url"       content="{{asset('media/'.$latest_img)}}" />
@endsection

@section('content')

{{-- Inicio --}}
<div class="position-relative mb-6">
        
    <img src="{{asset('/img/fachada-villa.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 45vh; object-fit:cover; object-position:bottom;">

    <div class="fondo-oscuro"></div>

    <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
        <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center mt-6">

            <h1 class="fs-1 text-decoration-underline">
                {{__('Avances de Obra')}}
            </h1>
            
        </div>
    </div>

</div>


<div class="position-relative">

    <img src="{{asset('/img/const-detail-2.webp')}}" alt="" class="position-absolute top-0 end-0" width="400px">
    <img src="{{asset('/img/const-detail-3.webp')}}" alt="" class="position-absolute top-50 end-0" width="300px">
    <img src="{{asset('/img/const-detail-4.webp')}}" alt="" class="position-absolute bottom-0 start-0" width="300px">


    {{-- Avances --}}
    <div class="row justify-content-center py-5 mb-6">

        @foreach ($const_updates as $update)

            @php
                $portrait = asset('/media/'.$update->portrait_path);
                $date = __(date_format($update->date, 'F')).' '.date_format($update->date, 'Y');
                $images = $update->getMedia('gallery_construction');
            @endphp

            <div class="col-12 col-lg-10 col-xxl-8">
                <div class="fs-5">{{$date}}</div>
                <div class="card rounded-0 mb-5 p-0 shadow-4">
    
                    <div class="position-relative">
                        <img src="{{$portrait}}" class="w-100" alt="Avance de Obra Virēo Living - {{$date}}" style="max-height: 470px; object-fit:cover;">

                        <div class="row position-absolute top-0 start-0 justify-content-center h-100">

                            <div class="col-12 text-center align-self-center">
                                @if ($update->video_link)
                                    <a href="{{$update->video_link}}" data-fancybox="construction-{{$update->id}}" class="link-light" aria-label="Ver avance de obra de {{$date}}"><i class="fa-solid fa-4x fa-play"></i></a>
                                @else
                                    <a href="#construction-{{$update->id}}-1" class="link-light text-decoration-none fs-1" aria-label="Ver avance de obra de {{$date}}"><i class="fa-regular fa-images"></i> {{count($images)}}</a>
                                @endif
                            </div>

                        </div>

                    </div>
    
                    <div class="card-body bg-green d-flex position-relative">
                        <img class="ms-4 me-5 d-none d-lg-block" src="{{asset('img/vire-logo-nav.webp')}}" alt="Logo de Virēo Living" height="64px">
                        
                        <h2 class="mb-0 lh-1">
                            {{$date}} <br> 
                            <span class="fs-5">{{__('Avance de Obra')}}</span> 
                        </h2>
    
                        <img src="{{ asset('/img/const-detail.webp') }}" alt="" class="position-absolute top-0 end-0 h-100">
                        
                    </div>
    
                    
    
                    @foreach ($images as $image)
                        <img src="{{$image->getUrl('large')}}" alt="Avance de Obra Virēo Living - {{$date}}" class="w-100 d-none" data-fancybox="construction-{{$update->id}}">
                    @endforeach
                    
                </div>
            </div>
            
        @endforeach

    </div>

</div>

@include('components.contact-form')

@endsection