@extends('components.base')

@section('titles')
    <title>{{__('Contacto')}} - Virēo Living, El Tigre</title>
    <meta name="description" content="{{__('Contacta a nuestro equipo de asesores de ventas en Virēo Living en Nuevo Vallarta, Nayarit. Completa nuestro formulario de contacto y recibe asistencia personalizada para encontrar la propiedad ideal para ti. Descubre un estilo de vida exclusivo frente al campo de golf El Tigre Golf & Country Club. ¡Contáctanos hoy y haz realidad tu sueño de vivir en Nuevo Vallarta!')}}">
@endsection

@section('content')

{{-- Inicio --}}
<div class="position-relative mb-6">
        
    <img src="{{asset('img/lobby-principal.webp')}}" alt="Ingreso principal de Virēo Living" class="w-100" style="height: 45vh; object-fit:cover;">

    <div class="fondo-oscuro"></div>

    <div class="row justify-content-center position-absolute top-0 left-0 h-100 z-3">
        <div class="col-11 col-lg-10 col-xl-8 text-center text-sand align-self-center mt-6">

            <h1 class="fs-1 text-decoration-underline">
                {{__('Contacto')}}
            </h1>
            
        </div>
    </div>

</div>

<div class="row justify-content-center mb-6">

    <div class="col-12 col-lg-7 align-self-center mt-4 mt-lg-0 px-3 px-lg-5">

        <h2 class="fs-2 text-brown px-2 mb-0 text-center">{{__('¿Te gustaría saber más?')}}</h2>
        <p class="fs-6 text-lightbrown px-2 mb-4 text-center">{{__('Completa el formulario y nuestros asesores se pondrán en contacto contigo.')}}</p>

        {{-- Formulario --}}
        <form action="{{route('send.email')}}#contact" method="post" id="contact_form">
            @csrf
        
            <div class="row">

                <div class="col-12">
                    <label for="full_name">{{__('Nombre')}}</label>
                    <input type="text" name="full_name" id="full_name" class="contact-input mb-3" required value="{{old('full_name')}}">
                </div>

                <x-honeypot/>

                <div class="col-12">
                    <label for="email">{{__('Correo')}}</label>
                    <input type="email" name="email" id="email" class="contact-input mb-3" required value="{{old('email')}}">
                </div>

                <div class="col-12">
                    <label for="phone">{{__('Teléfono')}}</label>
                    <input type="tel" name="phone" id="phone" class="contact-input mb-3" required value="{{old('phone')}}">
                </div>

                <div class="col-12">
                    <label for="contact_method">{{__('¿Cómo le gustaría ser contactado?')}}</label>
                    
                    <select class="form-select mb-3" name="contact_method" id="contact_method" required>
                        <option selected value="">{{__('Seleccione uno')}}</option>
                        <option value="Email">{{__('Email')}}</option>
                        <option value="Llamada">{{__('Llamada')}}</option>
                        <option value="WhatsApp">{{__('WhatsApp')}}</option>
                    </select>
                </div>

                <div class="col-12">
                    <textarea name="message" id="message" cols="30" class="contact-input mb-4" rows="3" placeholder="{{__('Mensaje')}}">{{old('message')}}</textarea>
                </div>

                <input type="hidden" name="url" id="url" value="{{ request()->fullUrl() }}">

                <div class="col-12 mb-5">
                    <button type="submit" id="submit-btn" class="btn btn-green rounded-0 shadow-4 w-100" @if(session('message')) disabled @endif>
                        {{__('Enviar')}}
                    </button>
                </div>

            </div>

        </form>

        {{-- Mensaje de éxito --}}
        @if (session('message'))
            <div class="p-3 text-success fw-semibold fs-5 text-center mb-4">
                <i class="fa-regular fa-circle-check"></i> {{__(session('message'))}}
            </div>
        @endif

        {{-- Errores --}}
        @if (session('errors'))
            @php
                $errors = session('errors');
            @endphp
            <div class="p-3 text-danger">
                @foreach ($errors as $error)
                    <div class="mb-2"><i class="fa-regular fa-circle-xmark"></i> {{$error}}</div>
                @endforeach
            </div>
        @endif

        {{-- Javascript --}}
        <script>

            const form = document.getElementById('contact_form');

            form.addEventListener('submit', function(event) {
                const msgButton = document.getElementById("submit-btn");
                msgButton.setAttribute("disabled", "true");
            });

            
        </script>

        @if (session('message'))
            <!-- Event snippet for Contactó por formulario conversion page -->
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}

                gtag('event', 'conversion', {'send_to': 'AW-996157886/4nfiCIH4i-sYEL7TgNsD'});
            </script>
        @endif
        

    </div>

</div>

@endsection