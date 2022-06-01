<?php
include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente
session_start();
if (isset($_SESSION['email'])) {
    $sessionEmail = $_SESSION['email'];
    $userObj = new UsersView;
    $userInfo = $userObj->showUserByEmail($sessionEmail);
}
?>
<script src="https://kit.fontawesome.com/6dcab8938d.js" crossorigin="anonymous"></script>

<style>
    .añadir-noticia {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        z-index: 100;
    }

    .fa-plus {
        margin-top: 13px;
    }
</style>
<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />

<nav class="navbar sticky-top navbar-expand-lg navbar-light shadow p-2 mb-4" style="background-color: #ffb84d;">
    <a class="navbar-brand" href="index.php"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        SportCity</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--Esto es otra seccion del navbar-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Secciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                        $seccionesObj = new SeccionesView();
                        $seccionesList = $seccionesObj->showSecciones();
                        foreach ($seccionesList as $seccion) {
                            echo '<a class="dropdown-item" href="seccionEspecifica.php?idShowSeccion=' . $seccion['categoryId'] . '" style="background-color:' . $seccion['categoryColor'] . ';color:white" >' . $seccion['categoryName'] . '</a>';
                        }
                    ?>
                    <!--<a class="dropdown-item" href="onlysoccer.html">Futbol Soccer</a>
                    <a class="dropdown-item" href="onlybasket.html">Basketball</a>
                    <a class="dropdown-item" href="onlybase.html">Baseball</a>
                    <a class="dropdown-item" href="onlyfootball.html">American Football</a>
                    <a class="dropdown-item" href="onlymma.html">MMA</a>
                    <a class="dropdown-item" href="onlybox.html">Boxeo</a>
                    <a class="dropdown-item" href="onlyjudo.html">Judo</a>
                    <a class="dropdown-item" href="onlygolf.html">Golf</a>
                    <a class="dropdown-item" href="onlyatletismo.html">Atletismo</a>
                    <a class="dropdown-item" href="onlyciclismo.html">Ciclismo</a>-->
                </div>
            </li>

        
            <?php
            if (isset($_SESSION['email'])) {
                if($userInfo[0]['userType']==1){
                    echo'
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrar Página
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="postNoticia.php">Publicaciones</a>
                            <a class="dropdown-item" href="secciones.php">Secciones</a>
                            <a class="dropdown-item" href="listaReporteros.php">Reporteros no autorizados</a>
                            <a class="dropdown-item" href="reportes.php">Generar reporte</a>
                    
                   
                        </div>
                    </li>
                    ';
                }
                elseif($userInfo[0]['userType']==2){
                    echo'
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrar Perfil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="postNoticia.php?lista=enRedaccion">Noticias en redacción</a>
                            <a class="dropdown-item" href="postNoticia.php?lista=terminadas">Noticias terminadas</a>
                            <a class="dropdown-item" href="postNoticia.php?lista=publicadas">Noticias publicadas</a>
                        </div>
                    </li>
                    ';
                }
            }
            ?>
            
        </ul>

        <form method="POST" action="reportes.php" class="form-inline my-2 my-lg-0">
            <a style="margin-right:5px">Desde:</a>
            <input class="form-control mr-sm-2" type="datetime-local" placeholder="desde" aria-label="Search" name="repFechaDesde">
            <a style="margin-right:5px">Hasta:</a>
            <input class="form-control mr-sm-2" type="datetime-local" placeholder="hasta" aria-label="Search" name="repFechaHasta">
            <select id="selectSeccion" class="form-control" id="exampleFormControlSelect1" name="repFiltroSeccion" style="margin-right:8px">
                <?php
                echo '<option value="" selected disabled hidden>Sección</option>';
                foreach ($seccionesList as $seccion) {
                  echo '<option value="' . $seccion['categoryId'] . '" style="background-color:' . $seccion['categoryColor'] . '">' . $seccion['categoryName'] . '</option>';
                }
                ?>
            </select>
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="reporteNoticiasBtn" style="margin-right:8px">Reporte por noticias</button>
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="reporteSeccionesBtn">Reporte por secciones</button>
        </form>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit"><img src="https://www.seekpng.com/png/full/920-9209972_magnifying-glass-png-white-search-icon-white-png.png" width="20" height="20" alt=""></button> -->
            <!--<a href="login.html" class="btn " role="button"
                    style="margin-left: 10px; background-color: #ffb84d; color: black;">Acceder</a>-->

            <!--<div class="media" style="margin-left: 10px;">
                <div class="media-body">
                    <h5 class="mt-0"></h5>
                </div>
            </div>-->
        <!-- </form> -->
        <?php
            if (!isset($_SESSION['email'])) {

                echo "<a href='login.html' class='btn' role='button' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Acceder</a>";
            } else {
                echo "<a href='perfil.php' class='btn' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Perfil</a>";
                echo "<a href='../includes/logout.inc.php' class='btn' name='logoutBtn' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Cerrar Sesión</a>";
            }
            ?>
    </div>
</nav>

<?php
if (isset($_SESSION['email'])) {
    if($userInfo[0]['userType']==2 && $userInfo[0]['autorized']==1){
        echo '<a href="nuevanoticia.php" class="añadir-noticia"> <i class="fa-solid fa-plus"></i></a>';
    }
}
?>