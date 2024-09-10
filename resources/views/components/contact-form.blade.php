@php
    $contact = request()->query('contact');    
@endphp

@if ($contact != 'no')
    <section class="row justify-content-center" title="Formulario de contacto" id="contact">

        <div class="col-12 col-lg-5 d-none d-lg-block px-0">
            <img src="{{asset('img/villa-interior-exterior.webp')}}" alt="Terraza de las Villas en Virēo Living" class="w-100" style="height: 70vh; object-fit:cover;">
        </div>

        <div class="col-12 col-lg-7 align-self-center mt-4 mt-lg-0 px-3 px-lg-5 py-5 py-lg-0">

            <h6 class="fs-2 text-brown px-2 mb-0 text-center text-lg-start">{{__('¿Te gustaría saber más?')}}</h6>
            <p class="fs-6 text-lightbrown px-2 mb-4 text-center text-lg-start">{{__('Completa el formulario y nuestros asesores se pondrán en contacto contigo.')}}</p>

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
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}

                const form = document.getElementById('contact_form');
                const form_btn = document.getElementById('submit-btn');

                // form.addEventListener('submit', function(event) {
                //     const msgButton = document.getElementById("submit-btn");
                //     msgButton.setAttribute("disabled", "true");
                // });

                form_btn.addEventListener('click', function(event) {
                    gtag('event', 'conversion', {'send_to': 'AW-996157886/K-h5CMT4i6MZEL7TgNsD'});
                    form_btn.setAttribute("disabled", "true");
                    form.submit();
                });
                
            </script>

            @if (session('message'))
                <!-- Event snippet for Contactó por formulario conversion page -->
                <script>
                    gtag('event', 'generate_lead', {'send_to':'G-5L3986HNDY', 'currency': 'MXN', 'value': 1});
                </script>
            @endif
            

        </div>

    </section>  
@endif