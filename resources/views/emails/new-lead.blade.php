<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensaje del sitio web de Caza Mabó</title>
    </head>

    <body>
        <p>
            Contacto recibido del sitio web de Caza Mabó
            @if( isset($msg->contact_pref) ) Esta persona esta interesada en agendar una cita. @endif
            @if( isset($msg->unit) ) <br> Esta persona descargó una cotización de la unidad {{$msg->unit->name}} con el plan de pagos {{$msg->plan->name}}. @endif
        </p>
        
        <p>Referido por: Punto401</p> <br>
    
        <p>Mensaje de: <strong>{{$msg->name}}</strong></p>
        <p>Correo: <strong>{{$msg->email}}</strong></p>
        <p>Telêfono: <strong>{{$msg->phone ?? 'Sin especificar'}}</strong></p>
    
        @if ( isset($msg->contact_pref) )
            <p>Preferencia de contacto: {{$msg->contact_pref}}</p>
            <p>Día para la cita: {{$msg->ap_date}}</p>
            <p>Hora para la cita: {{$msg->ap_time}}</p>
        @endif
    
        <p>Contenido: <strong>{{$msg->content ?? 'Sin Contenido'}}</strong></p> <br>
    
        <p>Enviado el: {{$msg->created_at}}</p>
        <p>Desde: {{$msg->url}}</p>
    
        @if ( isset($msg->contact_pref) )
            <p>Este mensaje fue enviado desde la landing page de agendar cita en cazamabosayulita.com</p>
        @elseif (isset($msg->unit))
            <p>Este mensaje fue enviado desde la landing page de cotizar en cazamabosayulita.com</p>
        @else
            <p>Este mensaje fue enviado desde un formulario de contacto en cazamabosayulita.com</p>
        @endif
    
    </body>

</html>