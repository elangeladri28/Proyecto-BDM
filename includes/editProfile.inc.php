<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

session_start();

$NombreUsuario = $_POST['nameEditProfile'];
$ApPatUsuario = $_POST['lastname1EditProfile'];
$ApMatUsuario = $_POST['lastname2EditProfile'];
$telUsuario = $_POST['phoneEditProfile'];
if (isset($_FILES['pictureEditProfile'])) {

    $FotoUsuario = $_FILES['pictureEditProfile']['tmp_name'];
    $fileError = $_FILES['pictureEditProfile']['error'];
    if ($fileError !== 0) {
        $FotoUsuario = 0;
    } else {
        $FotoUsuario = file_get_contents(addslashes($FotoUsuario));
    }
} else {

    $FotoUsuario = 0;
}
$Email = $_SESSION['email'];//$_POST['emailEditProfile'];
$Contrasena = $_POST['userPassEditProfile'];

$userEdited = new UsersContr();
$userEdited->editProfile($NombreUsuario, $ApPatUsuario, $ApMatUsuario, $telUsuario, $FotoUsuario, $Email, $Contrasena);
//require "perfil.php";
$_POST = array();
header("location: ../html/perfil.php");
exit();