<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
session_start();
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
        <form id="createNoticiaForm" action="../includes/createNoticia.inc.php" method="post" enctype="multipart/form-data">

            <h4>Titulo:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo" name="crearNoticiaTitle" required>
            </div>

            <h4>Lugar de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lugar de la noticia" name="crearNoticiaPlace">
            </div>

            <h4>Fecha de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="crearNoticiaDatetime">
            </div>

            <h4>Descripcion:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Descripcion" rows="4" name="crearNoticiaDesc" required></textarea>
            </div>

            <h4>Texto de la noticia:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Texto de la noticia" rows="4" name="crearNoticiaText" required></textarea>
            </div>

            <h4>Sección:</h4>
            <div id="conjuntoSecciones" class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <select id="selectSeccion" class="form-control" id="exampleFormControlSelect1" name="crearNoticiaSeccion[]" required multiple>
                    <?php
                    $seccionesObj = new SeccionesView();
                    $seccionesList = $seccionesObj->showSecciones();
                    //echo '<option value="" disabled selected hidden>Sección</option>';
                    foreach ($seccionesList as $seccion) {
                      echo '<option value="' . $seccion['categoryId'] . '">' . $seccion['categoryName'] . '</option>';
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Palabras clave (Separadas por coma)" name="crearNoticiaKeywords">
            </div>

            <h4>Urgente:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="checkbox" style="height:30px;width:30px;" id="exampleInputEmail1" aria-describedby="emailHelp" name="crearNoticiaEsUrgente">
            </div>

            <h4>Imagenes:</h4>
            <div id="imageFiles" class="form-group-video">
                <label>Agregar Imágenes</label>
                <input type="file" class="form-control-file" id="crearNoticiaImg" name="crearNoticiaImg[]" accept=".jpg,.jpeg,.png" oninput="addImgInput()" required>
                <!--<input type="file" class="form-control-file" id="crearNoticiaImg2" name="crearNoticiaImg2" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg3" name="crearNoticiaImg3" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg4" name="crearNoticiaImg4" accept=".jpg,.jpeg,.png">
                <input type="file" class="form-control-file" id="crearNoticiaImg5" name="crearNoticiaImg5" accept=".jpg,.jpeg,.png">-->
            </div>
            <!--<label>Agregar Imagen</label>
            <div class="form-group-video">

            </div>
            <label>Agregar Imagen</label>
            <div class="form-group-video">

            </div>-->

            <h4 style="margin-top:20px">Videos:</h4>
            <div id="videoFiles" class="form-group-video">
                <label for="Archivo1">Agregar videos</label>
                <input type="file" class="form-control-file" id="crearNoticiaVid" name="crearNoticiaVid[]" accept=".mp4,.wmv" oninput="addVidInput()" required>
                <!--<input type="file" class="form-control-file" id="Video2" name="crearNoticiaVid2" accept=".mp4,.wmv">
                <input type="file" class="form-control-file" id="Video3" name="crearNoticiaVid3" accept=".mp4,.wmv">-->
            </div>

            <h4 style="margin-top:20px">Estado:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <select class="form-control" id="exampleFormControlSelect1" name="crearNoticiaStatus">
                    <option value="EnRedaccion">En redacción</option>
                    <option value="Terminada">Terminada</option>
                </select>
            </div>

            <h4>Firma del reportero:</h4>
            <div class="form-group" style="margin-right: 20px; margin-left: 5px;">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Firma del reportero" name="crearNoticiaSign" required>
            </div>
            <button type="submit" name="createNoticiaBtn" class="btn btn-success btn-lg btn-block">Crear noticia</button>
        </form>

    </div> <!--Marco-->

</body>

</html>