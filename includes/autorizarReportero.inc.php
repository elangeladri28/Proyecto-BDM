<?php

include 'class-autoload.inc.php';  //Incluir clases automáticamente

$autorizeRepObj = new UsersContr;

if(isset($_GET['emailReportero'])){

    $reporteroEmail = $_GET['emailReportero'];
    $autorizeRepObj->autRep($reporteroEmail);
}

header("location: ../html/listaReporteros.php");
exit();