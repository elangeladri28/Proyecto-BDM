<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

if(isset($_GET['comentario'])){
    $commentId = $_GET['comentario'];
    $newsCommObj = new NewsCommsContr();
    $newsCommObj->deleteComment($commentId);

    //echo $_GET['noticia'];
    header("location: ../html/noticiaespecifica.php?noticia=" . $_GET['noticia'] . "");
    exit();
}