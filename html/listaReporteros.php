<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
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

    <link rel="icon" type="image/png" 
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />
</head>

<body>

    <div id="nav-bar">
    </div>

    <?php
    $reporterosObj = new UsersView;
    $reporteros = $reporterosObj->showReporterosNoAut();
    if(count($reporteros)==0){
        echo '<div class="container">
            <h1>No hay reporteros pendientes de autorizar</h1>
        </div>';
    }
    foreach($reporteros as $reportero){
    echo '
    <!-- MENSAJES-->
    <div class="container">';
        echo '<div class="col-lg-10 col-md-12 left-box">';
            echo '
            <div class="card">
                <div class="body">
                    <ul class="comment-reply list-unstyled">
                        <li class="row clearfix">';
                            echo '
                            <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="data:image;base64,' . base64_encode($reportero['picture']) . '" alt="Awesome Image" style="width:80px;height:80px;margin-top:10px;margin-left:30px;"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">' . $reportero['name'] . ' ' . $reportero['lastname1'] . ' ' . $reportero['lastname2'] . '</h5>
                                    <a class="btn btn-success" href="../includes/autorizarReportero.inc.php?emailReportero=' . $reportero['userEmail'] . '">Autorizar</a>
                                </div>';
                            echo '
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        ';
      }
    ?>
</body>

<script src="../js/navbar.js"></script>

</html>