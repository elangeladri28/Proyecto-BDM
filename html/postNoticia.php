<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
session_start();
if (isset($_SESSION['email'])) {
    $emailSesion = $_SESSION['email'];
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

    <link rel="stylesheet" href="../css/modsindex.css" />
    <link rel="icon" type="image/png" 
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />
</head>

<header>
</header>

<body>
    <div id="nav-bar">


    </div>
   

    <!--Hasta aqui termina mi header, aunque es body xd-->

    <!--Aqui empieza la pagina mecanicas-->
    <div class="container">
        <!--Aqui el contenido es debajo del carrusel-->
        <div class="container">
            <div class="row clearfix">
                <?php
                    $tipoLista = "";
                    $noticiasObj = new NoticiasView;
                    if(isset($_GET['lista'])){
                        $tipoLista = $_GET['lista'];
                        if($tipoLista=="enRedaccion"){
                            $noticiasList = $noticiasObj->showRedUser($emailSesion);
                        }
                        elseif($tipoLista=="terminadas"){
                            $noticiasList = $noticiasObj->showTermUser($emailSesion);
                        }
                        elseif($tipoLista=="publicadas"){
                            $noticiasList = $noticiasObj->showPubUser($emailSesion);
                        }
                    }
                    else{
                        $noticiasList = $noticiasObj->showNoticiasTerminadas();
                    }
                    if(count($noticiasList)==0){
                        echo '<h1>No hay noticias para mostrar</h1>';
                    }
                    $newsCatsObj = new NewsCatsView;
                    $seccionObj = new SeccionesView;
                    foreach ($noticiasList as $noticia) {
                        $idNoticia = $noticia['newsId'];
                        $newsImgObj = new NewsImgsView;
                        $imagenesNoticia = $newsImgObj->showNewsImgByNews($idNoticia);
                        $newsCats = $newsCatsObj->showNewscatsByNews($idNoticia);
                        $seccionesNoticia = [];
                        //echo count($seccionesNoticia);
                        $i=0;
                        //echo count($newsCats);
                        //echo $newsCats[0]['newsRelation'];
                        //echo count($imagenesNoticia);
                        foreach($newsCats as $newsCat){
                            $seccionInfo=$seccionObj->showSeccionById($newsCat['categoryRelation']);
                            $nombreSeccion=$seccionInfo[0]['categoryName'];
                            $seccionesNoticia[$i]=$nombreSeccion;
                            //echo $idNoticia;
                            //echo $nombreSeccion;
                            //echo $i;
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
                    <?php
                    if($tipoLista=="" || $tipoLista=="enRedaccion"){
                    ?>
                    <a href="editarNoticia.php?noticia=<?php echo $noticia['newsId']; ?>" type="button" class="btn btn-primary">Ver Noticia</a>
                    <?php
                    }
                    elseif($tipoLista=="terminadas" || $tipoLista=="publicadas"){
                    ?>
                    <a href="noticiaespecifica.php?noticia=<?php echo $noticia['newsId']; ?>" type="button" class="btn btn-primary">Ver Noticia</a>
                    <?php
                    }
                    ?>
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
                <?php } ?>
            </div>
        </div>
    </div>

</body>
<script src="../js/navbar.js"></script>

<script>



</script>

</html>