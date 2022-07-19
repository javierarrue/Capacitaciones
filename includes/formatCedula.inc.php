<?php
$cedulaNoFormat = array();
$cedulaNoFormat[0] = $_GET["cedula"];
//str_split("",$cedulaNoFormat);

$pattern = "/^(?:(0)?(\d{1,2})?)?(  )?(PE)?(N)?(E)?( )?(1PI)?(1AV)?/";
$result = preg_grep($pattern,$cedulaNoFormat);
var_dump($result);

///^P$|^(?:PE|E|N|[23456789]|[23456789](?:A|P)?|1[0123]?|1[0123]?(?:A|P)?)$|^(?:PE|E|N|[23456789]|[23456789](?:AV|PI)?|1[0123]?|1[0123]?(?:AV|PI)?)-?$|^(?:PE|E|N|[23456789](?:AV|PI)?|1[0123]?(?:AV|PI)?)-(?:\d{1,4})-?$|^(PE|E|N|[23456789](?:AV|PI)?|1[0123]?(?:AV|PI)?)-(\d{1,4})-(\d{1,6})$/i


//(?:(0)?(\d{1,2})?)(  )?(PE)?(N)?( )?(?:(0{1,3})?(\d{1,4}))(?:(0{1,4})?(\d{1,5}))

/**
 * 
 * 12  194101079
 * N 001900548
 * PE000190403
 * 08  094101079
 */

/**
Regular (provincia-libro-tomo). Ej: 1-1234-12345
Panameño nacido en el extranjero (PE-libro-tomo). Ej: PE-1234-123456
Extranjero con cédula (E-libro-tomo). Ej: E-1234-12345
Naturalizado (N-libro-tomo). Ej: N-1234-12345
Panameños nacidos antes de la vigencia (provinciaAV-libro-tomo). Ej: 1AV-1234-12345
Población indigena (provinciaPI-libro-tomo). Ej: 1PI-1234-12345

/**
 * Patron para primera parte de la cedula (provincia|PE|E|1PI|1AV):
 * ^(?:(0)?(\d{1,2})?)?(  )?(PE)?(N)?(E)?( )?(1PI)?(1AV)?
 * O un poco mas limpio
 *  
 * 
 * Patron para sacar el libro (4 digitos) y tomo (5 digitos) de la cedula.
 * (\d{4})(\d{5})
 *
 * Patron para el libro 
 * (0{1,3})?(\d{1,4})
 * 
 * Patron para tomo
 * (0{1,4})?(\d{1,5})
 */