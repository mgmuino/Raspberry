<?php

/* 
 * Funciones Acceso y Manejo de BBDD
 */

define('BD_USUARIO', 'root');
define('BD_PASSWORD', 'raspberry');
define('BD_NOME', 'raspberry');
define('BD_CONEX_PDO', 'mysql:host=localhost;dbname='.BD_NOME);


/**
 * 
 * @return type
 */
function conectaBd()
{
    try {
        //$db = new PDO("mysql:host=localhost", "root", "raspberry");
        $bd = mysql_connect(BD_CONEX_PDO, BD_USUARIO, BD_PASSWORD, BD_NOME);
        return($bd);
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}

?>


