<?php

    /*Provera da li je korisnik pravilno pristupio ovoj stranici,
    odnosno preko buttona za registraciju, a ne kucanjem adrese u browser.
    Ako nije stranica se reload-uje*/

    $error = "";

    if(isset($_POST["submit"])){
        
        $firstName = $_POST["first-name"];
        $lastName = $_POST["last-name"];
        $email = $_POST["email"];
        $username = $_POST["new-username"];
        $password = $_POST["new-password"];
        $privileges = $_POST["tip"];

        require_once "db.php";                // povezivanje sa bazom podataka
        require_once "functions.php";               // ukljucujemo i fajl sa funkcijama koje cemo koristiti


        if(emptySignupInput($firstName, $lastName, $email, $username, $password) == true){
            header("Location: ../php/signup.php?error=emptyInput");
            $error = "Niste popunili sva polja!";
            exit();
        }

        if(invalidName($firstName) == true){
            header("Location: ../php/signup.php?error=invalidName");
            exit();
        }

        if(invalidLastName($lastName) == true){
            header("Location: ../php/signup.php?error=invalidLastName");
            exit();
        }

        if(invalidEmail($email) == true){
            header("Location: ../php/signup.php?error=invalidEmail");
            exit();
        }

        if(usernameExist($conn, $username) == true){
            header("Location: ../php/signup.php?error=invalidUsername");
            exit();
        }

        addUser($conn, $firstName, $lastName, $email, $username, $password, $privileges);
        header("Location: ../php/login.php");
        exit();

    }
    else{
        header("Location: ../php/signup.php");
    }