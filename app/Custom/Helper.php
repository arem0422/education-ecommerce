<?php

/*
 * Helper utilidades para Sistema de matriculas
 * 
 *   @author Héctor Vilches Flores <hvilches@vgroup.cl>
 */

function formatoMoneda($n)
{

    return "$ " .number_format($n, 0, ",", ".");
}

/**
 * Devuelve un string con todos los errores para poder desplegarlo en un doc. HTML
 * @author Héctor Vilches Flores
 * 
 * @param type $errors
 * @return string
 */
function errorsToHtml($errors)
{

    $output = 'Sin Errores';
    if ($errors->any()) {
        $output = '<ul>';
        foreach ($errors->all() as $key => $error) {
            $output .= "<li>$error</li>";
        }
        $output .= "</ul>";
    }

    return $output;
}
/**
 * Formatea rut eliminando puntos y digito verificador.
 * @param type $rut
 * @return type
 */
function getRutFormateado($rut)
{

    $rutE = explode('-', $rut);
    return str_replace(".", "", $rutE[0]);
}

/**
 * Formatea rut eliminando puntos.
 * @param string $rut
 * 
 * @return string
 */
function sanitizeRut($rut)
{

    return str_replace(".", "", $rut);
}

function getRutFormateadoParaInacap($rut)
{
    return str_replace('.', '', $rut);
}

function getRutFormateadoParaAfiliado($rut)
{

    $rutE = str_replace(".", "", $rut);
    $rutE = str_replace("-", "", $rutE);
    return $rutE;
}

/**
 * Busca una coma,punto con una expresion regular y la reemplaza con blanco.
 * 
 * @author Hector Vilches Flores <hector.vilchesf@gmail.com>
 * @param string $n
 * @return int 
 */
function cleanNumber($n)
{

    $patrón = '/(\,)|(\.)/i';
    return preg_replace($patrón, "", $n);
}

/**
 * Helper que devulve de un string entregado solo los numeros
 * @author Hector vilches Flores
 * 
 * @return int
 */
function onlyNumber($string)
{

    return (int) preg_replace("/[^0-9]/", "", $string);
}

/**
 * Devuelve string generado en una instancia tryCatch
 */
function getErrorTryCatch($e)
{

    return $e->getMessage() . " => " . $e->getFile() . " : " . $e->getLine() . ' | ' . $e->getCode();
}

/**
 * Función para generar un token aleatorio de un largo prefedinido o seteable
 * @author Héctor Vilches Flores
 * 
 * @param int $lentgh largo del token
 * 
 * @return string
 */
function generateToken($length = 32)
{

    return bin2hex(random_bytes($length));
}

/**
 * Metodo para extraer una cadena de correos
 * 
 * @author Héctor Vilches Flores
 * 
 * @param string $input Cadena de correos separados por algun caracter 
 * 
 * @return array
 */
function getCorreosToArray($input, $separator = ",")
{
    $o = [];
    $patrones = array();
    $patrones[0] = '/{/';
    $patrones[1] = '/}/';
    $patrones[2] = '/\s\S/';
    $sustituciones = array();
    $sustituciones[2] = '';
    $sustituciones[1] = '';
    $sustituciones[0] = '';
    $input = preg_replace($patrones, $sustituciones, $input);
    foreach (explode($separator, $input) as $k => $v) {
        $e = filter_var($v, FILTER_SANITIZE_EMAIL);
        array_push($o, filter_var($v, FILTER_SANITIZE_EMAIL));
    }

    return $o;
}


