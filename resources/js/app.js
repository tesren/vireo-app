import './bootstrap';

Fancybox.bind("[data-fancybox]", {
    // Your custom options
});
  
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

document.addEventListener("DOMContentLoaded", function() {
    var whatsappLink = document.getElementById('whatsapp');
    var tooltip = new bootstrap.Tooltip(whatsappLink, {
        trigger: 'manual', // Activamos el tooltip manualmente
        placement: 'left' // Colocación del tooltip
    });
    
    // Mostramos el tooltip
    tooltip.show();
});

const form_inputs = document.getElementById('search_input_group');

if (window.innerWidth <= 768) {
    // Código a ejecutar solo en dispositivos móviles (ancho menor o igual a 768px)
    form_inputs.classList.remove('input-group');
    form_inputs.classList.remove('shadow-4');
}else{
    form_inputs.classList.add('input-group');
    form_inputs.classList.add('shadow-4');
}