<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_POST['deleteSeccionBtn']) and isset($_GET['seccionId'])){
    unset($_POST['deleteSeccionBtn']);
    $idSeccion = $_GET['seccionId'];
    $noticiasObj = new NoticiasView;
    $noticiasDeleteObj = new NoticiasContr;
    $noticiasDelete = $noticiasObj->showNoticiasPorSeccion($idSeccion);
    foreach($noticiasDelete as $noticia){
        $noticiasDeleteObj->deleteNoticiaSeccion($noticia['newsId'],$idSeccion);
    }
    $delSeccionObj = new SeccionesContr;
    $delSeccionObj -> deleteSeccion($_GET['seccionId']);
}
else if(isset($_POST['editSeccionBtn']) and isset($_GET['seccionId'])){
    unset($_POST['editSeccionBtn']);
    $nombreSeccion = $_POST['editSeccionName'];
    $ordenSeccion = $_POST['editSeccionOrder'];
    $colorSeccion = $_POST['editSeccionColor'];
    $editSeccionObj = new SeccionesContr();
    $editSucc = $editSeccionObj->modifySeccion($_GET['seccionId'], $nombreSeccion, $colorSeccion, $ordenSeccion);
    if(!$editSucc){
        $_POST = array();
        header("location: ../html/secciones.php?error=edit");
        exit();
    }
}

$_POST = array();
header("location: ../html/secciones.php");
exit();