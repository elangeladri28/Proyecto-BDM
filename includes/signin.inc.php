<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

if (isset($_POST['signinBtn'])) {

    $signin = new UsersContr();
    $NombreUsuario = $_POST['nameSignIn'];
    $ApPatUsuario = $_POST['lastname1SignIn'];
    $ApMatUsuario = $_POST['lastname2SignIn'];
    $TelUsuario = $_POST['phoneSignIn'];

    //$FotoUsuario = 0;

    $FotoUsuario = $_FILES['imageSignIn']['tmp_name'];
    //$FotoUsuario = base64_encode(file_get_contents(addslashes($FotoUsuario)));
    $FotoUsuario = file_get_contents(addslashes($FotoUsuario));

    $TipoUsuario = $_POST['userTypeSignIn'];
    if($TipoUsuario == "Reportero"){
        $TipoUsuario = 2;
    }
    elseif($TipoUsuario == "Lector"){
        $TipoUsuario = 3;
    }
    $Email = $_POST['emailSignIn'];
    $Contrasena = $_POST['passSignIn'];
    $signinSucc = $signin->createUser($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $Email, $TelUsuario, $Contrasena, $TipoUsuario, $FotoUsuario);
    if ($signinSucc) {
        //Mensaje de registro exitoso
    }
    header("location: ../html/index.php");
    exit();
}
else{
    header("location: ../html/index.php");
    exit();
}