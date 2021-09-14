<?php

    if(isset($_GET["stars"])){
        $stars = $_GET["stars"];
        $id = $_GET["id"];
        
        require_once "./functions.php";
        require_once "./db.php";

        updateRate($conn, $id, $stars);
        header("Location: ../php/product.php?id=$id");
        exit();

    }

    else{
        header("Location: ../index.php");
        exit();
    }