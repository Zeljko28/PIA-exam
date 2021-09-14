<?php

    if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "db.php";
    require_once "functions.php";

    if(emptyLoginInput($username, $password) == true){
        header("Location: ../php/login.php?error=emptyInput");
        $error = "Niste popunili sva polja!";
        exit();
    }

    if(invalidLogin($conn, $username, $password) == ""){
        header("Location: ../php/login.php?error=invalidUsernameOrPassword");
        $error = "Neispravno korisničko ime ili lozinka!";
        exit();
    }

    if(invalidLogin($conn, $username, $password) == "kupac"){
        session_start();
        $_SESSION["usersUsername"] = $username;
        $_SESSION["usersPrivileges"] = "kupac";
        
        $id = 0;

        $query = mysqli_query($conn, "SELECT * FROM users WHERE usersUsername = '$username'");
        while($row = mysqli_fetch_array($query)){
            $id = $row["id"];
        }

        $_SESSION["usersId"] = $id;


        header("Location: ../php/index.php");
        exit();
    }

    if(invalidLogin($conn, $username, $password) == "prodavac"){
        session_start();
        $_SESSION["usersUsername"] = $username;
        $_SESSION["usersPrivileges"] = "prodavac";

        $id = 0;

        $query = mysqli_query($conn, "SELECT * FROM users WHERE usersUsername = '$username'");
        while($row = mysqli_fetch_array($query)){
            $id = $row["id"];
        }

        $_SESSION["usersId"] = $id;

        header("Location: ../php/index.php");
        exit();
    }

    if(invalidLogin($conn, $username, $password) == "admin"){
        session_start();
        $_SESSION["usersUsername"] = $username;
        $_SESSION["usersPrivileges"] = "admin";

        $id = 0;

        $query = mysqli_query($conn, "SELECT * FROM users WHERE usersUsername = '$username'");

        while($row = mysqli_fetch_array($query)){
            $id = $row["id"];
        }
           
        

        $_SESSION["usersId"] = $id;

        header("Location: ../php/index.php");
        exit();
    }

    else{
        header("Location: ../php/index.php");
        exit();
    }

    }

    else{
        header("Location: ../php/login.php");
    }