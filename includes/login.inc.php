<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['loginBtn'])) {

    $login = new UsersContr();
    $userInfo = $login->validateUser();
    if ($userInfo and $userInfo[0]['active']==1) {

        $_SESSION['email'] = $_POST['emailLogin'];
        $_SESSION['tipo'] = $userInfo[0]['userType'];
        //echo $_SESSION['tipo'];

    } else {

        session_unset();
        session_destroy();
    }
}
$_POST = array();
header("location: ../html/index.php");
exit();