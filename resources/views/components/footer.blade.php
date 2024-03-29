<footer class="container-fluid bg-green py-4 py-lg-5">

    <div class="row justify-content-evenly">

        <div class="col-8 col-lg-3 col-xxl-2">
            <img src="{{asset('img/vireo-bone-color.svg')}}" alt="Logo de Vireo Living" class="w-100">
        </div>

        <div class="col-11 col-lg-3 align-self-center">
            <h6 class="fs-3">{{__('Contacto')}}</h6>

            <a href="mailto:info@domusvallarta.com" class="link-light text-decoration-none d-block mb-3 fs-5"><i class="fa-solid fa-envelope"></i> info@domusvallarta.com</a>
            <a href="tel:+523322005523" class="link-light text-decoration-none d-block mb-3 fs-5"><i class="fa-solid fa-phone"></i> 332 200 5523</a>
            <address class="fs-5"><i class="fa-solid fa-location-dot"></i> P.º de las Garzas 291, El Tigre, 63735 Nuevo Vallarta, Nay.</address>
        </div>

        <div class="col-11 col-lg-2 align-self-center">
            <a href="https://domusvallarta.com" class="text-decoration-none link-light">
                <div class="text-center fs-6 mb-2">{{__('Comercializador Exclusivo')}}</div>
                <img src="{{asset('img/domus-logo-white.svg')}}" alt="Logo de Domus Vallarta Inmobiliaria" class="w-100">
            </a>
        </div>

    </div>

</footer>

<div class="py-2 bg-blue text-center">
    <i class="fa-regular fa-copyright"></i> Copyright 2024 {{__('Todos los derechos reservados')}} | <a href="#" class="link-light">{{__('Aviso de Privacidad')}}</a>
     | 
    <a href="https://punto401.com" class="link-light text-decoration-none">
        Creado por <img width="70px" src="{{asset('img/logo-punto401.webp')}}" alt="Logo de Punto401 Marketing">
    </a>
</div>