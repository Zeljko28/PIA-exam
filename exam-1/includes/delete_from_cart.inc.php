<?php

    session_start();

    $uid = $_SESSION['usersId'];
    $pid = $_GET['pid'];
    require_once "./db.php";                
    require_once "./functions.php"; 
    
    
    delete_from_cart($conn, $uid, $pid);

    header("Location: ../php/cart.php");
    exit();