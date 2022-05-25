<?php

    session_start();
    session_unset();
    session_destroy();

    $_POST = array();
    header("location: ../html/index.php");
    exit();