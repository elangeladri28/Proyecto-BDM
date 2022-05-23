<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['createNoticiaBtn'])) {
    $createNoticia = new NoticiasContr();
    $noticiaTitle = $_POST['crearNoticiaTitle'];
    $noticiaDesc = $_POST['crearNoticiaDesc'];
    $noticiaText = $_POST['crearNoticiaText'];
    $noticiaCreator = $_SESSION['email'];
    $noticiaStatus = $_POST['crearNoticiaStatus'];
    $noticiaPlace = $_POST['crearNoticiaPlace'];
    $noticiaDatetime = $_POST['crearNoticiaDatetime'];
    $noticiaSign = $_POST['crearNoticiaSign'];
    $noticiaKeywords = $_POST['crearNoticiaKeywords'];
    if(isset($_POST['crearNoticiaEsUrgente'])){
        $noticiaImportant = 1;
    }
    else{
        $noticiaImportant = 0;
    }
    $noticiaImg = [];
    $noticiaVid = [];
    $noticiaVidName = [];


    $i = 0;
    while($_FILES['crearNoticiaImg']['tmp_name'][$i] != ''){
        $noticiaImg[$i] = $_FILES['crearNoticiaImg']['tmp_name'][$i];
        //echo $noticiaImg[$i];
        $fileError = $_FILES['crearNoticiaImg']['error'][$i];
        if ($fileError !== 0) {
            $noticiaImg[$i] = 0;
        } else {
            $noticiaImg[$i] = file_get_contents(addslashes($noticiaImg[$i]));
        }
        $i++;
    }

    //PRUEBAS
    /*foreach($noticiaImg as $imagen){
        echo 'Imagen';
    }*/
    //$lastIndex = count($noticiaImg) - 1;
    //unset($noticiaImg[$lastIndex]);

    $i = 0;
    while($_FILES['crearNoticiaVid']['tmp_name'][$i] != ''){
        $noticiaVid[$i] = $_FILES['crearNoticiaVid']['tmp_name'][$i];
        $noticiaVidName[$i] = $_FILES['crearNoticiaVid']['name'][$i];
        //echo $noticiaVid[$i];
        $fileError = $_FILES['crearNoticiaVid']['error'][$i];
        if ($fileError !== 0) {
            $noticiaVid[$i] = 0;
        } /*else {
            $noticiaVid[$i] = file_get_contents(addslashes($noticiaVid[$i]));
        }*/
        $i++;
    }

    //PRUEBAS
    /*foreach($noticiaVid as $video){
        echo 'Video';
    }*/
    //$lastIndex = count($noticiaVid) - 1;
    //unset($noticiaVid[$lastIndex]);

    $nextNoticiaId = $createNoticia->showNextId();
    $nextNoticiaId = $nextNoticiaId[0]['AUTO_INCREMENT'];
    $createNoticiaSucc = $createNoticia->createNoticia($noticiaTitle, $noticiaDesc, $noticiaText, $noticiaCreator, $noticiaStatus, $noticiaPlace, $noticiaDatetime,
    $noticiaSign, $noticiaKeywords, $noticiaImportant);
    if ($createNoticiaSucc) {
        //Agregar Videos e imágenes
        $newsImagesObj = new NewsImgsContr;
        $newsVideosObj = new NewsVidsContr;
        foreach($noticiaImg as $imagen){
            $newsImagesObj->createNewsImg($imagen, $nextNoticiaId, '');
        }
        $videoIndex = 0; //contador creado para acceder al arreglo de name del video en el mismo index del foreach
        foreach($noticiaVid as $video){
            $nextVideoId = $newsVideosObj->showNextVideoId();
            $nextVideoId = $nextVideoId[0]['AUTO_INCREMENT'];
            $ext = pathinfo($noticiaVidName[$videoIndex], PATHINFO_EXTENSION);
            if (!file_exists('../'. 'videos/' . $nextNoticiaId)) {
                mkdir('../'. 'videos/' . $nextNoticiaId, 0777, true);
            }
            $destinationPath = 'videos/' . $nextNoticiaId . '/' . $nextVideoId . '.' . $ext;
            move_uploaded_file($video, '../' . $destinationPath);
            $newsVideosObj->createNewsVid($destinationPath, $nextNoticiaId, '');
        }

    }
    header("location: ../html/nuevanoticia.php");
    exit();
}