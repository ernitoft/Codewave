<?php

function makeMessages(){

    $messages = [
        'correo.required' => '- Debe ingresar su correo electrónico para iniciar sesión.',
        'correo.email' => '- Usuario no registrado o contraseña incorrecta.',
        'contrasena.required' => '- Debe ingresar su contraseña para iniciar sesión.',
        'document.required' => 'El campo archivo es requerido.',
        'document.mimes' => 'El archivo seleccionado no es Excel con extensión .xlsx.',
        'document.max' => 'El tamaño máximo del archivo a cargar no puede superar los 5 megabytes.',
        'code.regex' => 'la reserva XXXXXX no existe en el sistema',
        'code.between' => 'la reserva XXXXXX no existe en el sistema',
        'code.required' => 'debe proporcionar un código de reserva'
    ];
    return $messages;
}
