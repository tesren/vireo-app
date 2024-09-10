@php
    $contact = request()->query('contact');
@endphp

@if ($contact != 'no')

    {{-- Botón de WhatsApp --}}
    <a id="whatsapp" href="https://wa.me/5213322005523?text={{ urlencode(__('Hola, vengo del sitio web de Virēo Living')) }}" target="_blank" rel="noopener noreferrer"
        class="text-decoration-none position-fixed d-flex justify-content-center shadow-4 rounded-circle text-white z-3 shadow-3" 
        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="{{__('Envíanos un mensaje')}}">

        <i class="fa-brands align-self-center fa-whatsapp"></i>
    </a>

@endif