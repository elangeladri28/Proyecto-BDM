<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['postCommentBtn'])) {

    $createComment = new NewsCommsContr();
    if(isset($_GET['responder'])){
        $isMainComment = 0;
        $commentReplied = $_GET['responder'];
    }
    else {
        $isMainComment = 1;
        $commentReplied = NULL;
    }
    $commentOwnerNews = $_GET['noticia'];
    $commentOwnerUser = $_SESSION['email'];
    $commentText = $_POST['commentText'];

    $createComment->createComment($isMainComment, $commentReplied, $commentOwnerNews, $commentOwnerUser, $commentText);
}
$_POST = array();
header("location: ../html/noticiaespecifica.php?noticia=" . $_GET['noticia'] . "");
exit();