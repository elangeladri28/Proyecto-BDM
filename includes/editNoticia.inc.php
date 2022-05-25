<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_POST['publishNoticiaBtn'])){
    $newsObj = new NoticiasContr();
    $newsObj->publishNoticia($_GET['noticia']);
}
else if(isset($_POST['returnNoticiaBtn'])){
    $newsObj = new NoticiasContr();
    $newsObj->rejectNoticia($_GET['noticia'],$_POST['editarNoticiaComentarios']);
}
else if(isset($_POST['editNoticiaBtn'])){
    $newsObj = new NoticiasContr();
    $noticiaTitle = $_POST['editNoticiaTitle'];
    $noticiaDesc = $_POST['editNoticiaDesc'];
    $noticiaText = $_POST['editNoticiaText'];
    $noticiaStatus = $_POST['editNoticiaStatus'];
    $noticiaPlace = $_POST['editNoticiaPlace'];
    $noticiaDatetime = $_POST['editNoticiaDatetime'];
    $noticiaSign = $_POST['editNoticiaSign'];
    $noticiaKeywords = $_POST['editNoticiaKeywords'];
    if(isset($_POST['editNoticiaEsUrgente'])){
        $noticiaImportant = 1;
    }
    else{
        $noticiaImportant = 0;
    }
    $noticiaImg = [];
    $noticiaVid = [];
    $noticiaVidName = [];
    $idSecciones = [];


    $i = 0;
    while($_FILES['editNoticiaImg']['tmp_name'][$i] != ''){
        $noticiaImg[$i] = $_FILES['editNoticiaImg']['tmp_name'][$i];
        //echo $noticiaImg[$i];
        $fileError = $_FILES['editNoticiaImg']['error'][$i];
        if ($fileError !== 0) {
            $noticiaImg[$i] = 0;
        } else {
            $noticiaImg[$i] = file_get_contents(addslashes($noticiaImg[$i]));
        }
        $i++;
    }

    $i = 0;
    while($_FILES['editNoticiaVid']['tmp_name'][$i] != ''){
        $noticiaVid[$i] = $_FILES['editNoticiaVid']['tmp_name'][$i];
        $noticiaVidName[$i] = $_FILES['editNoticiaVid']['name'][$i];
        //echo $noticiaVid[$i];
        $fileError = $_FILES['editNoticiaVid']['error'][$i];
        if ($fileError !== 0) {
            $noticiaVid[$i] = 0;
        }
        $i++;
    }

    $i = 0;
    foreach($_POST['editNoticiaSeccion'] as $seccionId){
        $idSecciones[$i] = $seccionId;
        //echo $seccionId;
        $i++;
    }

    $noticiaId = $_GET['noticia'];
    $newsObj->modifyNoticia($noticiaId, $noticiaTitle, $noticiaDesc, $noticiaText, $noticiaStatus, 0, $noticiaPlace, $noticiaDatetime, $noticiaSign, $noticiaKeywords, $noticiaImportant, 0);
    
    //BORRAR SECCIONES ANTERIORES PARA CREAR LAS NUEVAS
    $newsCatsObj = new NewsCatsContr;
    $newsCatsObj->deleteNewsCatsByNews($noticiaId);

    //Agregar Videos e imágenes
    $newsImagesObj = new NewsImgsContr;
    $newsVideosObj = new NewsVidsContr;
    $newsCatsContr = new NewsCatsContr;
    $newsCatsView = new NewsCatsView;

    foreach($noticiaImg as $imagen){
        $newsImagesObj->createNewsImg($imagen, $noticiaId, '');
    }
    $videoIndex = 0; //contador creado para acceder al arreglo de name del video en el mismo index del foreach
    foreach($noticiaVid as $video){
        $nextVideoId = $newsVideosObj->showNextVideoId();
        $nextVideoId = $nextVideoId[0]['AUTO_INCREMENT'];
        $ext = pathinfo($noticiaVidName[$videoIndex], PATHINFO_EXTENSION);
        if (!file_exists('../'. 'videos/' . $noticiaId)) {
            mkdir('../'. 'videos/' . $noticiaId, 0777, true);
        }
        $destinationPath = 'videos/' . $noticiaId . '/' . $nextVideoId . '.' . $ext;
        move_uploaded_file($video, '../' . $destinationPath);
        $newsVideosObj->createNewsVid($destinationPath, $noticiaId, '');
    }
    foreach($idSecciones as $idSeccion){
        $newsCatsContr->createNewscats($noticiaId, $idSeccion);
    }
}
elseif(isset($_POST['deleteNoticiaBtn'])){
    $newsObj = new NoticiasContr();
    $newsObj->deleteNoticia($_GET['noticia']);
}

$_POST = array();
if($_GET['userType']==2){
    header("location: ../html/postNoticia.php?lista=enRedaccion");
    exit();
}
elseif($_GET['userType']==1){
    header("location: ../html/postNoticia.php");
    exit();
}