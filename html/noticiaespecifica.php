<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
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

            </div>

            <div class="col-lg-3">

                <div class="card mt-4">
                    <div class="card-body" style="text-align: center;">

                        <div class="media">
                            <?php echo '<img src="data:image;base64,' . base64_encode($creatorInfo[0]['picture']) . '" width="40px" class="mr-3" alt="...">'?>
                            <div class="media-body">
                              <h6 class="mt-0"><?php echo $creatorInfo[0]['name'] . ' ' . $creatorInfo[0]['lastname1'] . ' ' . $creatorInfo[0]['lastname2']?></h6>
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
                      <p class="mt-0"><?php echo $noticiaInfo[0]['newsText']; ?></p>
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

        <div class=" card-deck">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
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
                <img src="..." class="card-img-top" alt="...">
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
                <img src="..." class="card-img-top" alt="...">
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
        </div>
    </div>





</body>
<script src="../js/navbar.js"></script>
</html>