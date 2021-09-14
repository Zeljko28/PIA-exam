<?php

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        require_once "./db.php";
        require_once "./functions.php";

        delete_user($conn, $id);
    }