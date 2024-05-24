<?php

// Muestra colecciones o recorre arrays para imprimirlos.

function mostrarDatosArray($unArray)
{
    echo "######### ARRAY #########" . "\n";
    foreach ($unArray as $unElemento) {
        echo $unElemento . "\n";
    }
    echo "######### ARRAY #########" . "\n";
};

// Retorna un string a partir de los datos de un array

function retornarCadenaDesdeArray($unArray) {
    $cadena = "";
    foreach ($unArray as $unElemento) {
        $cadena = $cadena . " " . $unElemento . "\n";
    }
    return $cadena;
};


