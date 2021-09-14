<?php

    session_start();

    $uid = $_SESSION['usersId'];
    $pid = $_GET['pid'];
    require_once "./db.php";                
    require_once "./functions.php"; 
    
    
    add_to_cart($conn, $uid, $pid);

    header("Location: ../php/product.php?id=$pid");
    exit();