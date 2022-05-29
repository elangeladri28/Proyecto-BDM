<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['createSeccionBtn'])) {

    $createSeccion = new SeccionesContr();
    $seccionName = $_POST['seccionName'];
    $seccionOrder = $_POST['seccionOrden'];
    $seccionColor = $_POST['seccionColor'];
    //$seccionImage = file_get_contents(addslashes($seccionImage));

    $createSeccionSucc = $createSeccion->createSeccion($seccionName, $seccionColor, $seccionOrder);
    if (!$createSeccionSucc) {
        $_POST = array();
        header("location: ../html/secciones.php?error=create");
        exit();
    }
}
$_POST = array();
header("location: ../html/secciones.php");
exit();