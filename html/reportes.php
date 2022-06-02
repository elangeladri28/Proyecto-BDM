<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'navReportes.php';
    ?>
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

<?php
$repFechaDesde = "";
$repFechaHasta = "";
if(isset($_POST['repFechaDesde'])){
    if($_POST['repFechaDesde']!=""){
        $repFechaDesde = $_POST['repFechaDesde'];
    }
    else{
        //echo 'entra al else 1';
        $repFechaDesde = "1000-01-01 00:00:00";
    }
}
if(isset($_POST['repFechaHasta'])){
    if($_POST['repFechaHasta']!=""){
        //echo 'entra al if 2';
        $repFechaHasta = $_POST['repFechaHasta'];
    }
    else{
        //echo 'entra al else 2';
        $repFechaHasta = "9999-12-31 23:59:59";
    }
}
if(isset($_POST['repFiltroSeccion'])){
    if($_POST['repFiltroSeccion']!=""){
        //echo 'entra al if 2';
        $repFiltroSeccion = $_POST['repFiltroSeccion'];
    }
    else{
        //echo 'entra al else 2';
        $repFiltroSeccion = "";
    }
}
else{
    $repFiltroSeccion = "";
}
$fechaDesdeFormat = date_create($repFechaDesde);
$fechaDesdeFormat = date_format($fechaDesdeFormat,'d/m/Y H:i:s');
$fechaHastaFormat = date_create($repFechaHasta);
$fechaHastaFormat = date_format($fechaHastaFormat,'d/m/Y H:i:s');
$reportesObj = new ReportesView;
$reportesSecciones = [];
if (isset($_POST['reporteNoticiasBtn'])) {
    $reportesNoticias = $reportesObj->showReporteNoticias($repFechaDesde, $repFechaHasta, $repFiltroSeccion);
    echo '<div class="container">';
        echo '<table>';
            echo '<tr>';
                echo '<th>Sección</th>';
                echo '<th>Fecha</th>';
                echo '<th>Noticia</th>';
                echo '<th>Cantidad de likes</th>';
                echo '<th>Cantidad de comentarios</th>';
            echo '</tr>';
            foreach($reportesNoticias as $reporteNoticia){
            echo '<tr>';
                echo '<td>' . $reporteNoticia['categoryName'] . '</td>';
                echo '<td>' . $reporteNoticia['publishDate'] . '</td>';
                echo '<td>' . $reporteNoticia['newsTitle'] . '</td>';
                echo '<td>' . $reporteNoticia['likes'] . '</td>';
                echo '<td>' . $reporteNoticia['numberOfComments'] . '</td>';
            echo '</tr>';
            }
        echo '</table>';
    echo '</div>';
}
elseif(isset($_POST['reporteSeccionesBtn'])){
    //CREAR CAMPO DE RANGO DE FECHAS PARA LA TABLA SEGÚN EL FILTO
    if($repFechaDesde == "1000-01-01 00:00:00" && $repFechaHasta == "9999-12-31 23:59:59"){
        $campoFechas = 'Todas';
    }
    elseif($repFechaDesde != "1000-01-01 00:00:00" && $repFechaHasta != "9999-12-31 23:59:59"){
        $campoFechas = $fechaDesdeFormat . ' a ' . $fechaHastaFormat;
    }
    elseif($repFechaDesde == "1000-01-01 00:00:00" && $repFechaHasta != "9999-12-31 23:59:59"){
        $campoFechas = 'Antes de ' . $fechaHastaFormat;
    }
    elseif($repFechaDesde != "1000-01-01 00:00:00" && $repFechaHasta == "9999-12-31 23:59:59"){
        $campoFechas = 'Después de ' . $fechaDesdeFormat;
    }


    if($repFiltroSeccion!=""){
        $reporte = $reportesObj->showReporteSeccion($repFechaDesde, $repFechaHasta, $repFiltroSeccion);
        if($reporte[0]['numberOfLikes']==''){
            $reporte[0]['numberOfLikes']=0;
        }
        if($reporte[0]['numberOfComments']==''){
            $reporte[0]['numberOfComments']=0;
        }
        if($reporte[0]['categoryName']==''){
            $seccionObj = new SeccionesView;
            $seccionInfo = $seccionObj->showSeccionById($repFiltroSeccion);
            $reporte[0]['categoryName']=$seccionInfo[0]['categoryName'];
        }
        // echo $reporte[0]['categoryName'] . '      ';
        // echo $reporte[0]['numberOfLikes'] . '      ';
        // echo $reporte[0]['numberOfComments'] . '      ';
        // echo '<hr>';
        echo '<div class="container">';
        echo '<table>';
            echo '<tr>';
                echo '<th>Sección</th>';
                echo '<th>Fechas</th>';
                echo '<th>Cantidad de likes</th>';
                echo '<th>Cantidad de comentarios</th>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>' . $reporte[0]['categoryName'] . '</td>';
                echo '<td>' . $campoFechas . '</td>';
                echo '<td>' . $reporte[0]['numberOfLikes'] . '</td>';
                echo '<td>' . $reporte[0]['numberOfComments'] . '</td>';
            echo '</tr>';

        echo '</table>';
        echo '</div>';
    }
    else{
        $seccionesObj = new SeccionesView;
        $seccionesList = $seccionesObj->showSecciones();
        foreach($seccionesList as $seccion){
            $seccionId = $seccion['categoryId'];
            $reporteSeccion = $reportesObj->showReporteSeccion($repFechaDesde, $repFechaHasta, $seccionId);
            
            if($reporteSeccion[0]['categoryName']==''){
                $seccionObj = new SeccionesView;
                $seccionInfo = $seccionObj->showSeccionById($seccionId);
                $reportesSecciones[$seccionId]['categoryName']=$seccionInfo[0]['categoryName'];
            }
            else{
                $reportesSecciones[$seccionId]['categoryName']=$reporteSeccion[0]['categoryName'];
            }


            if($reporteSeccion[0]['numberOfLikes']!=''){
                $reportesSecciones[$seccionId]['numberOfLikes']=$reporteSeccion[0]['numberOfLikes'];
                $reportesOrdenados[$seccionId] = $reporteSeccion[0]['numberOfLikes'];
            }
            else{
                $reportesSecciones[$seccionId]['numberOfLikes'] = 0;
                $reportesOrdenados[$seccionId] = 0;
            }

            if($reporteSeccion[0]['numberOfComments']!=''){
                $reportesSecciones[$seccionId]['numberOfComments']=$reporteSeccion[0]['numberOfComments'];
            }
            else{
                $reportesSecciones[$seccionId]['numberOfComments'] = 0;
            }

            arsort($reportesOrdenados);

            //echo 'arreglo' . count($reportesOrdenados);
            // echo $reportesSecciones[$seccionId]['categoryName'] . '      ';
            // echo $reportesSecciones[$seccionId]['numberOfLikes'] . '      ';
            // echo $reportesSecciones[$seccionId]['numberOfComments'] . '      ';
            // echo '<hr>';
        }
        echo '<div class="container">';
        echo '<table>';
            echo '<tr>';
                echo '<th>Sección</th>';
                echo '<th>Fechas</th>';
                echo '<th>Cantidad de likes</th>';
                echo '<th>Cantidad de comentarios</th>';
            echo '</tr>';
            foreach($reportesOrdenados as $key => $val){
            echo '<tr>';
                echo '<td>' . $reportesSecciones[$key]['categoryName'] . '</td>';
                echo '<td>' . $campoFechas . '</td>';
                echo '<td>' . $reportesSecciones[$key]['numberOfLikes'] . '</td>';
                echo '<td>' . $reportesSecciones[$key]['numberOfComments'] . '</td>';
            echo '</tr>';
            // echo $reportesSecciones[$key]['categoryName'] . '      ';
            // echo $reportesSecciones[$key]['numberOfLikes'] . '      ';
            // echo $reportesSecciones[$key]['numberOfComments'] . '      ';
            // echo '<hr>';
            }
        echo '</table>';
        echo '</div>';
        
    }  
}
$_POST = array();
?>

</body>

</html>