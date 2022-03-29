<?php
session_start();
?>
<script src="https://kit.fontawesome.com/6dcab8938d.js" crossorigin="anonymous"></script>

<style>
.añadir-noticia {
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
  }
  
  .fa-plus {
    margin-top:13px;
  }
  </style>

    <nav  class="navbar sticky-top navbar-expand-lg navbar-light shadow p-2 mb-4" style="background-color: #ffb84d;">
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
                <!--Esto es otra seccion del navbar-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        En Equipo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="onlysoccer.html">Futbol Soccer</a>
                        <a class="dropdown-item" href="onlybasket.html">Basketball</a>
                        <a class="dropdown-item" href="onlybase.html">Baseball</a>
                        <a class="dropdown-item" href="onlyfootball.html">American Football</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        De Pelea
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="onlymma.html">MMA</a>
                        <a class="dropdown-item" href="onlybox.html">Boxeo</a>
                        <a class="dropdown-item" href="onlyjudo.html">Judo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Individuales
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="onlygolf.html">Golf</a>
                        <a class="dropdown-item" href="onlyatletismo.html">Atletismo</a>
                        <a class="dropdown-item" href="onlyciclismo.html">Ciclismo</a>
                    </div>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><img
                        src="https://www.seekpng.com/png/full/920-9209972_magnifying-glass-png-white-search-icon-white-png.png"
                        width="20" height="20" alt=""></button>
                <!--<a href="login.html" class="btn " role="button"
                    style="margin-left: 10px; background-color: #ffb84d; color: black;">Acceder</a>-->
                
                <?php
                if (!isset($_SESSION['email'])) {

                    echo "<a href='login.html' class='btn' role='button' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Acceder</a>";
                } else {
                    echo "<a href='perfil.php' class='btn' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Perfil</a>";
                    echo "<a href='../includes/logout.inc.php' class='btn' name='logoutBtn' style='margin-left: 10px; background-color: #ffb84d; color: black;'>Cerrar Sesión</a>";
                }
                ?>

                <div class="media" style="margin-left: 10px;">

                  
                    <div class="media-body">
                        <h5 class="mt-0"></h5>

                    </div>
                </div>
            </form>
        </div>
    </nav>
    <a href="" class="añadir-noticia"> <i class="fa-solid fa-plus"></i></a>