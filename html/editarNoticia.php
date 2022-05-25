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
    $userObj = new UsersView;


    $disabled="";
    if(isset($_SESSION['email'])){
        $sessionEmail = $_SESSION['email'];
        $sessionUser = $userObj->showUserByEmail($sessionEmail);
        if($sessionUser[0]['userType']==1){
            $disabled="disabled";
        }
    }
    $idNoticia = $_GET['noticia'];
    $noticiaInfo = $noticiaObj->showNoticiaById($idNoticia);
    $creadorNoticia = $userObj->showUserByEmail($noticiaInfo[0]['creatorUser']);
    $noticiaImagenes = $noticiaImgsObj->showNewsImgByNews($idNoticia);
    $noticiaVideos = $noticiaVidsObj->showNewsVidByNews($idNoticia);
    $creatorInfo = $creatorInfoObj->showUserByEmail($noticiaInfo[0]['creatorUser']);
    $idSecciones = $newsCatsObj->showNewscatsByNews($idNoticia);
    $idsArray = [];
    $i = 0;
    foreach($idSecciones as $idSeccion){
        $idsArray[$i] = $idSeccion['categoryRelation'];
    }
    //PRUEBA
    /*foreach($idsArray as $id){
        echo $id;
    }*/
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
    <link rel="stylesheet" href="../css/modsnuevanoticia.css" />
    <script defer src="../js/imagesvideos.script.js"></script>
</head>

<header>
</header>



<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light shadow p-2 mb-4" style="background-color: #ffb84d;">
        <a class="navbar-brand" href="index.php"> <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png"
                width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            SportCity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
        </div>
    </nav>
    <div class="noticiamarco">
        <h1>Nueva Noticia</h1>
        <form id="createNoticiaForm" action="../includes/editNoticia.inc.php?noticia=<?php echo $idNoticia;?>&userType=<?php echo $sessionUser[0]['userType'];?>" method="post" enctype="multipart/form-data">

            <?php
            if($disabled=="disabled"){
            ?>
            <h4>Creador:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo" name="creadorNoticia"
                value="<?php echo $creadorNoticia[0]['name'] . ' ' . $creadorNoticia[0]['lastname1'] . ' ' . $creadorNoticia[0]['lastname2'] . ' ' . $noticiaInfo[0]['creatorUser'];?>" disabled required>
            </div>
            <?php
            }
            ?>

            <h4>Titulo:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo" name="editNoticiaTitle"
                value="<?php echo $noticiaInfo[0]['newsTitle'];?>" <?php echo $disabled; ?> required>
            </div>

            <h4>Lugar de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lugar de la noticia" name="editNoticiaPlace"
                value="<?php echo $noticiaInfo[0]['newsPlace'];?>" <?php echo $disabled; ?>>
            </div>

            <h4>Fecha de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="editNoticiaDatetime"
                value="<?php
                const HTML_DATETIME_LOCAL = 'Y-m-d\TH:i'; //escape the literal T so it is not expanded to a timezone code
                $php_timestamp = strtotime($noticiaInfo[0]['newsDate']);
                $html_datetime_string = date(HTML_DATETIME_LOCAL, $php_timestamp);
                echo $html_datetime_string;?>" <?php echo $disabled; ?>>
            </div>

            <h4>Descripcion:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Descripcion" rows="4" name="editNoticiaDesc" required <?php echo $disabled; ?>><?php echo $noticiaInfo[0]['newsDescription'];?></textarea>
            </div>

            <h4>Texto de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Texto de la noticia" rows="4" name="editNoticiaText" required <?php echo $disabled; ?>><?php echo $noticiaInfo[0]['newsText'];?></textarea>
            </div>

            <h4>Sección:</h4>
            <div id="conjuntoSecciones" class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <select id="selectSeccion" class="form-control" id="exampleFormControlSelect1" name="editNoticiaSeccion[]" required multiple <?php echo $disabled; ?>>
                    <?php
                    $seccionesObj = new SeccionesView();
                    $seccionesList = $seccionesObj->showSecciones();
                    //echo '<option value="" disabled selected hidden>Sección</option>';
                    foreach ($seccionesList as $seccion) {
                        if(in_array($seccion['categoryId'],$idsArray,false)){
                            $selected = "selected";
                        }
                        else{
                            $selected = "";
                        }
                        echo '<option value="' . $seccion['categoryId'] . '" ' . $selected . '>' . $seccion['categoryName'] . '</option>';
                    }
                    ?>
                    <!--<option>Futbol Soccer</option>
                    <option>Basketball</option>
                    <option>Baseball</option>
                    <option>American Football</option>
                    <option>MMA</option>
                    <option>Boxeo</option>
                    <option>Judo</option>
                    <option>Golf</option>
                    <option>Atletismo</option>
                    <option>Ciclismo</option>-->
                </select>
            </div>
            <!--<a id="addSeccion" class="btn btn-success" style="margin-left:5px" onclick="addSeccionInput()">Agregar Sección</a>
            <a id="deleteSeccion" class="btn btn-danger" onclick="deleteSeccionInput()">Eliminar Sección</a>-->

            <!-- <script>
                function addSeccionInput(){
            	    var opciones = document.getElementById('selectSeccion');
            	    var conjuntoSecciones = document.getElementById('conjuntoSecciones');
            	    console.log('Hola');
            	    var opcionesAdd = opciones.cloneNode(true);
            	    conjuntoSecciones.appendChild(opcionesAdd);
                }
                function deleteSeccionInput(){
                    var conjuntoSecciones = document.getElementById('conjuntoSecciones');
                    var cantidadSecciones = conjuntoSecciones.getElementsByTagName('select');
                    if(cantidadSecciones.length >1){
                        conjuntoSecciones.removeChild(cantidadSecciones[(cantidadSecciones.length) - 1]);
                    }
                }
            </script> -->

            <h4>Palabras clave:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Palabras clave (Separadas por coma)" name="editNoticiaKeywords"
                value="<?php echo $noticiaInfo[0]['keyWords'];?>" <?php echo $disabled; ?>>
            </div>

            <h4>Urgente:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="checkbox" style="height:30px;width:30px;" id="exampleInputEmail1" aria-describedby="emailHelp" name="editNoticiaEsUrgente"
                <?php if($noticiaInfo[0]['important']){echo 'checked';};?> <?php echo $disabled; ?>>
            </div>

            <?php
                foreach($noticiaImagenes as $imagen){
                    echo'
                        <img src="data:image;base64,' . base64_encode($imagen['imageFile']) . '" class="d-block w-100 rounded" alt="...">
                    ';
                    if($disabled==""){
                        echo'<a href="../includes/deleteNewsImg.inc.php?idNewsImage=' . $imagen['newsImageId'] . '&noticia=' . $idNoticia . '" class="btn btn-danger">Borrar imagen</a>';
                    }
                }
            ?>

            <?php
            foreach($noticiaVideos as $video){
                echo '<video width="100%" height="auto" controls style="background-color: black">
                <source src="../' . $video['videoPath'] . '" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
                </video>';
                if($disabled==""){
                    echo'<a href="../includes/deleteNewsVid.inc.php?idNewsVideo=' . $video['newsVideoId'] . '&noticia=' . $idNoticia . '" class="btn btn-danger">Borrar video</a>';
                }
            }
            ?>

            <?php
            if($disabled==""){
            ?>
            <h4>Imagenes:</h4>
            <div id="imageFiles" class="form-group-video">
                <label>Agregar Imágenes</label>
                <input type="file" class="form-control-file" id="crearNoticiaImg" name="editNoticiaImg[]" accept=".jpg,.jpeg,.png" oninput="addImgInput()"
                <?php if(count($noticiaImagenes)==0){echo 'required';}?>>
                <!--<input type="file" class="form-control-file" id="crearNoticiaImg2" name="crearNoticiaImg2" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg3" name="crearNoticiaImg3" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg4" name="crearNoticiaImg4" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg5" name="crearNoticiaImg5" accept=".jpg,.jpeg,.png">-->
            </div>
            <?php
            }
            ?>
            <!--<label>Agregar Imagen</label>
            <div class="form-group-video">

            </div>
            <label>Agregar Imagen</label>
            <div class="form-group-video">

            </div>-->

            <?php
            if($disabled==""){
            ?>
            <h4 style="margin-top:20px">Videos:</h4>
            <div id="videoFiles" class="form-group-video">
                <label for="Archivo1">Agregar videos</label>
                <input type="file" class="form-control-file" id="crearNoticiaVid" name="editNoticiaVid[]" accept=".mp4,.wmv" oninput="addVidInput()" 
                <?php if(count($noticiaVideos)==0){echo 'required';}?>>
                <!--<input type="file" class="form-control-file" id="Video2" name="crearNoticiaVid2" accept=".mp4,.wmv">
                <input type="file" class="form-control-file" id="Video3" name="crearNoticiaVid3" accept=".mp4,.wmv">-->
            </div>
            <?php
            }
            ?>

            <h4 style="margin-top:20px">Estado:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <select class="form-control" id="exampleFormControlSelect1" name="editNoticiaStatus" <?php echo $disabled; ?>>
                    <option value="EnRedaccion" <?php if($noticiaInfo[0]['newsStatus']=='EnRedaccion'){echo 'selected';}?>>En redacción</option>
                    <option value="Terminada" <?php if($noticiaInfo[0]['newsStatus']=='Terminada'){echo 'selected';}?>>Terminada</option>
                </select>
            </div>

            <h4>Firma del reportero:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Firma del reportero" name="editNoticiaSign" required
                value="<?php echo $noticiaInfo[0]['signature'];?>" <?php echo $disabled; ?>>
            </div>


            <h4>Comentarios del administrador:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Comentarios del administrador" rows="4" name="editarNoticiaComentarios" required <?php if($sessionUser[0]['userType'] !=1 ){echo 'disabled';} ?>><?php echo $noticiaInfo[0]['editorComment'];?></textarea>
            </div>


            <?php
            if($disabled=="disabled"){
            ?>
            <button type="submit" name="publishNoticiaBtn" class="btn btn-success btn-lg btn-block">Publicar noticia</button>
            <button type="submit" name="returnNoticiaBtn" class="btn btn-danger btn-lg btn-block">Devolver noticia</button>
            <a href="postNoticia.php" name="backToIndex" class="btn btn-warning btn-lg btn-block">Regresar a publicaciones</a>
            <?php
            }
            else{
            ?>
            <button type="submit" name="editNoticiaBtn" class="btn btn-success btn-lg btn-block">Editar noticia</button>
            <?php if($sessionUser[0]['userType']==2 && $noticiaInfo[0]['newsStatus']=='EnRedaccion'){ ?>
            <button type="submit" name="deleteNoticiaBtn" class="btn btn-danger btn-lg btn-block">Eliminar noticia</button>
            <?php } ?>
            <?php
            }
            ?>

        </form>

    </div> <!--Marco-->

</body>

</html>