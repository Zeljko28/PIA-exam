<?php


    session_start();

    require_once "./functions.php";
    require_once "./db.php";
    
    $uid = $_SESSION["usersId"];

    delete_cart($conn, $uid);

    session_unset();
    session_destroy();

    header("Location: ../php/login.php");
    exit();