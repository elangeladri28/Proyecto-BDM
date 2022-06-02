<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
session_start();
if(isset($_GET['noticia'])){

    $noticiaObj = new NoticiasView;
    $noticiaImgsObj = new NewsImgsView;
    $noticiaVidsObj = new NewsVidsView;
    $creatorInfoObj = new UsersView;
    $newsCatsObj = new NewsCatsView;
    $seccionesObj = new SeccionesView;


    $idNoticia = $_GET['noticia'];
    $noticiaInfo = $noticiaObj->showNoticiaById($idNoticia);
    $noticiaImagenes = $noticiaImgsObj->showNewsImgByNews($idNoticia);
    $noticiaVideos = $noticiaVidsObj->showNewsVidByNews($idNoticia);
    $creatorInfo = $creatorInfoObj->showUserByEmail($noticiaInfo[0]['creatorUser']);
    $idSeccion = $newsCatsObj->showNewscatsByNews($idNoticia);
    $idSeccion = $idSeccion[0]['categoryRelation'];
    $seccionInfo = $seccionesObj->showSeccionById($idSeccion);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport City</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="../css/modsgolf.css" />
    <script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"</script>
    <script>
        $(document).ready(function() {
            $(".like__btn").click(function(){
                //console.log('SiEntraAlScript');
                $("#like").load("../includes/managelikes.inc.php",{
                    noticia: <?php echo $idNoticia;?>,
                    usuario: <?php echo '"' . $_SESSION['email'] . '"';?>
                });
            });
        });
    </script>

</head>

<header>
</header>

<body>


    <!-- Navigation -->
    <div id="nav-bar">



    </div>


    <div class="container" style="margin-top: 50px;">

        <div class="row">

            <div class="col-lg-9">

                <div class="card mt-4">
                    <div id="carouselExampleCaptions" class="carousel slide under" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php
                            $cantidadImagenes = count($noticiaImagenes);
                            for ($i = 0; $i < $cantidadImagenes; $i++) {
                                if($i==0){
                                    echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $i . '" class="active"></li>';
                                }
                                else{
                                    echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $i . '"></li>';
                                }
                            }
                            ?>
                            <!--<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>-->
                        </ol>

                        <div class="carousel-inner">
                        <?php
                            $index = 0;
                            foreach($noticiaImagenes as $imagen){
                                if($index==0){
                                    echo'<div class="carousel-item active">';
                                }
                                else{
                                    echo'<div class="carousel-item">';
                                }
                                echo'
                                    <img src="data:image;base64,' . base64_encode($imagen['imageFile']) . '" class="d-block w-100 rounded" alt="...">
                                </div>
                                ';
                                $index ++;
                            }
                        ?>
                        </div>
            
                        <!--<div class="carousel-inner">
                            <div class="carousel-item  active">
                                <img src="https://notideportes.club/wp-content/uploads/2021/11/El-exito-y-la-marca-de-Spieth-siguen-siendo-importantes.jpg"
                                    class="d-block w-100 rounded" alt="...">
                                
                            </div>
                            <div class="carousel-item">
                                <img src="https://progolfnow.com/wp-content/uploads/getty-images/2016/04/1211805613.jpeg"
                                    class="d-block w-100 rounded" alt="...">
                                
                            </div>
                            <div class="carousel-item">
                                <img src="https://static01.nyt.com/images/2020/05/11/sports/02golf-cbd1-print/merlin_170313657_6f0dca56-287b-493f-8898-9e98b4b90932-mobileMasterAt3x.jpg"
                                    class="d-block w-100 rounded" alt="...">
                                
                            </div>
                        </div>-->
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>
                <!-- /.card -->


                <!-- /.card -->

                <!--BOTON DE LIKE-->

                <?php
                $likeObj = new NewsLikesView;
                if(isset($_SESSION['email'])){
                    $isLiked = $likeObj->showLikeUserNews($idNoticia,$_SESSION['email']);
                    $isLiked = $isLiked[0]['exists'];
                    //echo $isLiked;
                }
                else{
                    $isLiked = FALSE;
                    //echo $isLiked;
                }
                ?>

                <?php
                if($noticiaInfo[0]['newsStatus']=='Publicada'){
                ?>
                <div style="margin-top:10px">
                    <button class="like__btn" id="like" <?php if(!isset($_SESSION['email'])){ echo 'disabled'; }?>>
                        <span id="icon"><i <?php if($isLiked){echo 'class="fa-solid fa-thumbs-up"';}else{echo 'class="fa-regular fa-thumbs-up"';}?>></i></span>
                        <span id="count"><?php echo $noticiaInfo[0]['likes'] ?></span>
                    </button>
                </div>
                <script src="../js/likebtn.js"></script>
                <?php
                }
                ?>

            </div>

            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-body" style="text-align: center;">
                        <div class="media">
                            <?php echo '<img src="data:image;base64,' . base64_encode($creatorInfo[0]['picture']) . '" width="40px" class="mr-3" alt="...">'?>
                            <div class="media-body">
                                <h6 class="mt-0"><?php echo $creatorInfo[0]['name'] . ' ' . $creatorInfo[0]['lastname1'] . ' ' . $creatorInfo[0]['lastname2']?></h6>
                                <hr>
                                <small><?php echo $noticiaInfo[0]['publishDate']; ?></small>
                                <hr>
                                <h5 class="mt-0"><?php echo $noticiaInfo[0]['newsTitle']; ?></h5>
                                <p><?php echo $noticiaInfo[0]['newsDescription']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.col-lg-3 -->



        </div>

        <br>

        <div class="col-xs-">
            <div class="card mt-4">
                <div class="card-body" style="text-align: left;">
                    <div class="media-body">
                        <small><?php echo $noticiaInfo[0]['newsPlace']; ?></small>
                        <hr>
                        <small><?php echo $noticiaInfo[0]['newsDate']; ?></small>
                        <hr>
                        <p class="mt-0" style="white-space: pre-line"><?php echo $noticiaInfo[0]['newsText']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <?php
            foreach($noticiaVideos as $video){
                echo '<video width="100%" height="auto" controls style="background-color: black">
                <source src="../' . $video['videoPath'] . '" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
                </video>';
            }
            
        ?>

        <br>

        <?php
        if($noticiaInfo[0]['newsStatus']=='Publicada'){
        ?>
        <div class="card">
          <div class="header">
            <h2 style="margin-left:50px;margin-top:50px">Comentarios</h2>
          </div>
          <div class="body" style="margin:50px">
            <ul class="comment-reply list-unstyled">
              <!--COMENTARIOS-->
              <?php
              $commentObj = new NewsCommsView;
              $userObj = new UsersView;
              $comments = $commentObj->showMainCommentByNews($idNoticia);
              if(count($comments) == 0){
                echo '<h5>Sé el primero en dejar un comentario</h5>';
              }
              else{
                foreach ($comments as $comment) {
                  $commentUser = $userObj->showUserByEmail($comment['commentOwnerUser']);
                  echo '
                  <li class="row clearfix" style="margin-top:20px">
                  <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="data:image;base64,' . base64_encode($commentUser[0]['picture']) . '" alt="Awesome Image" style="width: 120px;;height:120px;"></div>
                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                      <h5 class="m-b-0">' . $commentUser[0]['name'] . ' ' . $commentUser[0]['lastname1'] . ' ' . $commentUser[0]['lastname2'] . '</h5>
                      <p>' . $comment['commentText'] . '</p>
                      <small>' . $comment['commentDate'] . '</small>
                    </div>
                  </li>
                  ';
                  if (isset($_SESSION['email'])) {
                  echo '<a href="noticiaespecifica.php?noticia=' . $idNoticia . '&responder=' . $comment['commentId'] . '" class="btn btn-primary" style="margin-top:20px">Responder</a>';
                      $sessionUserInfo = $userObj->showUserByEmail($_SESSION['email']);
                      if ($sessionUserInfo[0]['userType'] == 1 || $sessionUserInfo[0]['userEmail'] == $commentUser[0]['userEmail'] || $sessionUserInfo[0]['userEmail'] == $noticiaInfo[0]['creatorUser']) {
                      echo '<a href="../includes/deleteComment.inc.php?noticia=' . $idNoticia . '&comentario=' . $comment['commentId'] . '" class="btn btn-danger" style="margin-top:20px;margin-left:10px">Eliminar</a>';
                      }
                  }
                  $replyComments = $commentObj->showReplyByMainComment($comment['commentId']);
                  foreach($replyComments as $replyComment){
                      $replyCommentUser = $userObj->showUserByEmail($replyComment['commentOwnerUser']);
                      echo '
                      <li class="row clearfix" style="margin-left:150px;margin-top:20px">
                      <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="data:image;base64,' . base64_encode($replyCommentUser[0]['picture']) . '" alt="Awesome Image" style="width: 120px;;height:120px;"></div>
                        <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                          <h5 class="m-b-0">' . $replyCommentUser[0]['name'] . ' ' . $replyCommentUser[0]['lastname1'] . ' ' . $replyCommentUser[0]['lastname2'] . '</h5>
                          <p>' . $replyComment['commentText'] . '</p>
                          <small>' . $replyComment['commentDate'] . '</small>
                        </div>
                      </li>
                      ';
                      if (isset($_SESSION['email'])) {
                              $sessionUserInfo = $userObj->showUserByEmail($_SESSION['email']);
                              if ($sessionUserInfo[0]['userType'] == 1 || $sessionUserInfo[0]['userEmail'] == $replyCommentUser[0]['userEmail'] || $sessionUserInfo[0]['userEmail'] == $noticiaInfo[0]['creatorUser']) {
                              echo '<a href="../includes/deleteComment.inc.php?noticia=' . $idNoticia . '&comentario=' . $replyComment['commentId'] . '" class="btn btn-danger" style="margin-top:20px;margin-left:165px">Eliminar</a>';
                              }
                          }
                  }
                }
            }
            ?>
            </ul>
          </div>
        </div>

        <br>

        <?php
        if (isset($_SESSION['email'])) {
          echo '
          <form method="POST" action="../includes/postComment.inc.php?noticia=' . $idNoticia . '';
          if(isset($_GET['responder'])){
              echo '&responder=' . $_GET['responder'] . '';
          }
          echo '" class="card">
          <div class="header">
            <h4 style="margin-left:20px;margin-top:20px">Publica un comentario</h4>
          </div>
          <div class="body">
            <div class="comment-form">
              <form class="row clearfix">
                <div class="col-sm-12">
                  <div class="form-group">';
                  echo '<textarea rows="4" class="form-control no-resize" placeholder="Escribe un comentario..." name="commentText" require></textarea>';
          echo
          '</div>
                  <button type="submit" class="btn btn-block btn-primary" style="margin-bottom:20px" name="postCommentBtn">Publicar</button>
                </div>
              </form>
            </div>
          </div>
        </form>
          ';
        }
        ?>

        <br>

        <?php
        $keyWords = $noticiaInfo[0]['keyWords'];
        $keyWordsArray = explode(',', $keyWords);
        //PRUEBA
        // foreach($keyWordsArray as $keyWord){
        //     echo ' ' . $keyWord . ' ';
        // }
        ?>
        <h1 style="color:white">Noticias relacionadas</h1>
        <div class="row clearfix">
            <?php
            foreach($keyWordsArray as $keyWord){
                $noticiasObj = new NoticiasView;
                $noticiasList = $noticiasObj->showNoticiasRelacionadas($idNoticia,$keyWord);
                $catsObj = new NewsCatsView;
                $seccionObj = new SeccionesView;
                foreach ($noticiasList as $noticia) {
                    $noticiaId = $noticia['newsId'];
                    $newsImgObj = new NewsImgsView;
                    $imagenesNoticia = $newsImgObj->showNewsImgByNews($noticiaId);
                    $newsCats = $catsObj->showNewscatsByNews($noticiaId);
                    $seccionesNoticia = [];
                    $i=0;
                    foreach($newsCats as $newsCat){
                        $infoSeccion=$seccionObj->showSeccionById($newsCat['categoryRelation']);
                        $nombreSeccion=$infoSeccion[0]['categoryName'];
                        $seccionesNoticia[$i]=$nombreSeccion;
                        $i++;
                    }
            ?>
            <div class="card" style="width:31.33%;margin:1%">
                <img src="data:image;base64,<?php echo base64_encode($imagenesNoticia[0]['imageFile']); ?>"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $noticia['newsTitle']; ?> </h5>
                    <p class="card-text"> <?php echo $noticia['newsDescription']; ?> </p>
                </div>
                <!--Botonsote-->
                <a href="noticiaespecifica.php?noticia=<?php echo $noticia['newsId']; ?>" type="button" class="btn btn-primary">Ver Noticia</a>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">
                    <?php
                    $i=0;
                    foreach($seccionesNoticia as $seccionNoticia){
                        if($i==0){
                            echo 'Sección: ' . $seccionNoticia;
                        }
                        else{
                            echo ', ' . $seccionNoticia;
                        }
                        $i++;
                    }
                    ?>
                    </small>
                    <br>
                    <small><?php echo $noticia['publishDate'] ?></small>
                </div>
            </div>
            <?php   }
                }
            ?>
        </div>

        <!-- <div class=" card-deck" style="margin-bottom:30px">
            <div class="card">
                <img src="https://www.conmishijos.com/uploads/educacion/testdeportesingles.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider
                        card with supporting text below as a
                        natural lead-in to
                        additional content. This content is
                        a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3
                        mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="https://www.conmishijos.com/uploads/educacion/testdeportesingles.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">TThis is a wider
                        card with supporting text below as a
                        natural lead-in to
                        additional content. This content is
                        a little bit longer.This is a wider
                        card with supporting text below as a
                        natural lead-in to
                        additional content. This content is
                        a little bit longer.
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3
                        mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="https://www.conmishijos.com/uploads/educacion/testdeportesingles.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider
                        card with supporting text below as a
                        natural lead-in to
                        additional content. This card has
                        even longer content than the first
                        to show that equal height
                        action.</p>
                </div>
                
                <div class="card-footer">
                    <small class="text-muted">Last updated 3
                        mins ago</small>
                </div>
            </div>
        </div> -->
        <?php
        }
        ?>
    </div>





</body>
<script src="../js/navbar.js"></script>
</html>