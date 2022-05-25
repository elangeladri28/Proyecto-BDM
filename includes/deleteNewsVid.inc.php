<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_GET['idNewsVideo'])){
    $idNewsVideo = $_GET['idNewsVideo'];
    $newsVidContrObj = new NewsVidsContr();
    $newsVidViewObj = new NewsVidsView();
    $newsVideoInfo = $newsVidViewObj->showNewsVidById($idNewsVideo);
    $newsVideoPath = $newsVideoInfo[0]['videoPath'];
    unlink("../" . $newsVideoPath . "");
    $newsVidContrObj->deleteNewsVid($idNewsVideo);

    header("location: ../html/editarNoticia.php?noticia=" . $_GET['noticia'] . "");
    exit();
}