<?php
session_start();
require_once 'funciones.php';
    // Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE);
$_SESSION['hayErrores'] = (isset($_SESSION['hayErrores']))?
            $_SESSION['hayErrores']:FALSE;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Nuevo Proyecto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div><h2><u>Nuevo proyecto</u></h2></div>
        <form action="grabar_nuevo_proyecto.php" method="GET">
            <div>Proyecto: <input type="text" name="proyecto" 
                              value="<?php echo $_SESSION['datos'][0]; ?>"/>
            </div>
           <?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_PROYECTO."</div>";
                }
            ?>
            <div>Creador: <input type="text" name="creador" 
                            value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_CREADOR."</div>";
                }
            ?>
            <div>Descripcion: <input type="text" name="descripcion" 
                            value="<?php echo $_SESSION['datos'][2]; ?>"/></div>
            </div>
            <?php
                if ($_SESSION['errores'][2]) {
                    echo "<div class 'error'>".MSG_ERR_DESCRIPCION."</div>";
                }
            ?>
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>