<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if(isset($_SESSION['email'])){
    $deleteUser = new UsersContr();
    $deleteUser->deleteUser($_SESSION['email']);
    session_unset();
    session_destroy();

    header("location: ../html/index.php");
    exit();
}