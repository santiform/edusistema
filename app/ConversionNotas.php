<?php

namespace App;

class ConversionNotas
{
    public static function notaEnLetras($nota)
{
    // Reemplaza la coma por el punto como separador decimal
    $nota = str_replace(',', '.', $nota);

    // Define un arreglo de letras para las notas enteras
    $letras = [
        0 => 'Cero',
        1 => 'Uno',
        2 => 'Dos',
        3 => 'Tres',
        4 => 'Cuatro',
        5 => 'Cinco',
        6 => 'Seis',
        7 => 'Siete',
        8 => 'Ocho',
        9 => 'Nueve',
        10 => 'Diez',
    ];

    // Redondea la nota a dos decimales
    $nota = number_format((float)$nota, 2, '.', '');

    // Divide la nota en parte entera y decimal
    list($parte_entera, $parte_decimal) = explode('.', $nota);

    // Convierte la parte entera a número
    $parte_entera = (int)$parte_entera;

    // Inicializa el resultado con la parte entera
    $resultado = '';

    // Verifica si la nota está en el arreglo de notas enteras
    if (array_key_exists($parte_entera, $letras)) {
        $resultado .= $letras[$parte_entera];
    } else {
        return 'No hay registros';
    }

    // Si la parte decimal es mayor que 0, agrega la parte decimal
    if ($parte_decimal > 0) {
        $resultado .= ' ' . self::decimalEnLetras($parte_decimal);
    }

    return $resultado;
}

// Función para convertir la parte decimal en letras
private static function decimalEnLetras($decimal)
{
    // Define un arreglo de letras para las partes decimales
    $letras_decimal = [
        '50' => 'cincuenta',
        // Agrega más valores según sea necesario
    ];

    // Verifica si la parte decimal está en el arreglo
    if (array_key_exists($decimal, $letras_decimal)) {
        return $letras_decimal[$decimal];
    }

    return '';
}



}
