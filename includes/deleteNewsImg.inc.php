<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_GET['idNewsImage'])){
    $idNewsImage = $_GET['idNewsImage'];
    $newsImgObj = new NewsImgsContr();
    $newsImgObj->deleteNewsImg($idNewsImage);

    //echo $_GET['noticia'];
    header("location: ../html/editarNoticia.php?noticia=" . $_GET['noticia'] . "");
    exit();
}