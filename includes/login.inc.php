<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['loginBtn'])) {

    $login = new UsersContr();
    $userInfo = $login->validateUser();
    if ($userInfo) {

        $_SESSION['email'] = $_POST['emailLogin'];
        $_SESSION['tipo'] = $userInfo[0]['userType'];
        //echo $_SESSION['tipo'];

    } else {

        session_unset();
        session_destroy();
    }
    header("location: ../html/index.php");
    exit();
}
