<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_POST['deleteSeccionBtn']) and isset($_GET['seccionId'])){
    unset($_POST['deleteSeccionBtn']);
    $delSeccionObj = new SeccionesContr;
    $delSeccionObj -> deleteSeccion($_GET['seccionId']);
}
else if(isset($_POST['editSeccionBtn']) and isset($_GET['seccionId'])){
    unset($_POST['editSeccionBtn']);
    $nombreSeccion = $_POST['editSeccionName'];
    $ordenSeccion = $_POST['editSeccionOrder'];
    $colorSeccion = $_POST['editSeccionColor'];
    $editSeccionObj = new SeccionesContr();
    $editSeccionObj->modifySeccion($_GET['seccionId'], $nombreSeccion, $colorSeccion, $ordenSeccion);
}

$_POST = array();
header("location: ../html/secciones.php");
exit();