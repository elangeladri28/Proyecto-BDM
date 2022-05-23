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
    if (isset($_FILES['editSeccionImage'])) {
        $imagenSeccion = $_FILES['editSeccionImage']['tmp_name'];
        $fileError = $_FILES['editSeccionImage']['error'];
        if ($fileError !== 0) {
            $imagenSeccion = 0;
        } else {
            $imagenSeccion = file_get_contents(addslashes($imagenSeccion));
        }
    } else {
    
        $imagenSeccion = 0;
    }
    $editSeccionObj = new SeccionesContr();
    $editSeccionObj->modifySeccion($_GET['seccionId'], $nombreSeccion, $imagenSeccion, $ordenSeccion);
}

header("location: ../html/secciones.php");
exit();