<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['createSeccionBtn'])) {

    $createSeccion = new SeccionesContr();
    $seccionName = $_POST['seccionName'];
    $seccionOrder = $_POST['seccionOrden'];
    $seccionImage = $_FILES['seccionImage']['tmp_name'];
    $seccionImage = file_get_contents(addslashes($seccionImage));

    $createSeccionSucc = $createSeccion->createSeccion($seccionName, $seccionImage, $seccionOrder);
    if ($createSeccionSucc) {
        //Mensaje de registro exitoso
    }
    header("location: ../html/secciones.php");
    exit();
}
else{
    header("location: ../html/secciones.php");
    exit();
}