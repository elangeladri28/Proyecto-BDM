<?php
include 'class-autoload.inc.php';  //Incluir clases automáticamente
$newsId = $_POST['noticia'];
$userEmail = $_POST['usuario'];
$likeObj = new NewsLikesContr;
$wasDeleted = $likeObj->deleteLike($newsId, $userEmail);
$noticiaObj = new NoticiasView;
$noticiaInfo = $noticiaObj->showNoticiaById($newsId);
if($wasDeleted){
    //echo 'Entra al if';
    //echo $wasDeleted;
    echo '
            <span id="icon"><i class="fa-regular fa-thumbs-up"></i></span>
            <span id="count">' . $noticiaInfo[0]['likes'] . '</span>
    ';
}
else{
    //echo 'Entra al else';
    //echo $wasDeleted;
    $likeObj->createLike($newsId, $userEmail);
    $noticiaInfo = $noticiaObj->showNoticiaById($newsId);
    echo '
            <span id="icon"><i class="fa-solid fa-thumbs-up"></i></span>
            <span id="count">' . $noticiaInfo[0]['likes'] . '</span>
    ';
}
?>