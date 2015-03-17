<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Constantes


define('MSG_ERR', "Error...");
define('MSG_ERR_PROYECTO', "Error Proyecto...");
define('MSG_ERR_CREADOR', "Error Creador...");
define('MSG_ERR_DESCRIPCION', "Error Descripcion...");

// Funciones de validación

function limpiar($valor) {
    return strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1"))); 
}

function validarProyecto($valor) {

    return TRUE;
}

function validarCreador($valor) {
    
    return TRUE;
}

function validarDescripcion($valor) {
    
    return TRUE;
}
