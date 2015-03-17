<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validarDatosRegistro() {
    // Recuperar datos Enviados desde formulario_nuevo_proyecto.php
    $datos = Array();
    $datos[0] = (isset($_REQUEST['proyecto']))?
            $_REQUEST['proyecto']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['creador']))?
            $_REQUEST['creador']:"";
    $datos[2] = (isset($_REQUEST['descripcion']))?
            $_REQUEST['descripcion']:"";

    //-----validar ---- //
    $errores = Array();
    $errores[0] = !validarProyecto($datos[0]);
    $errores[1] = !validarCreador($datos[1]);
    $errores[2] = !validarDescripcion($datos[2]);

    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;  
    $_SESSION['hayErrores'] = 
            ($errores[0] || $errores[1] || $errores[2]);
    
}


// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $url = "formulario_nuevo_proyecto.php";
    header('Location:'.$url);
} else {
    $db = conectaBd();  
    $proyecto = $_SESSION['datos'][0];
    $creador = $_SESSION['datos'][1];
    $descripcion =  $_SESSION['datos'][2];
    
    $consulta = "INSERT INTO listado_proyectos 
    (proyecto, creador, descripcion)
    VALUES (:proyecto, :creador, :descripcion)";
    $resultado = $db->prepare($consulta);
    //print_r($consulta);
    if ($resultado->execute(array(":proyecto" => $proyecto, ":creador" => $creador,
        ":descripcion" => $descripcion))) {
        
        unset ($_SESSION['datos']);
        unset ($_SESSION['errores']);
        unset ($_SESSION['hayErrores']);
        
        $url = "grabacion_ok.php";
        header('Location:'.$url);
    } else {
        $url = "error.php?msg_error=Error_Grabar_Nuevo_Proyecto";
        header('Location:'.$url);
    }

    $db = null;

}

?>