<?php 

    
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $name = $_POST["first-name"];
            $lastname = $_POST["last-name"];
            $new_username = $_POST["new-username"];
            $new_password = $_POST["new-password"];
            $email = $_POST["email"];

            require_once "./db.php";
            require_once "./functions.php";

            $sql = "UPDATE users SET usersFirstName='$name' WHERE id='$id';";
            $conn->query($sql);

            $sql = "UPDATE users SET usersLastName='$lastname' WHERE id='$id';";
            $conn->query($sql);

            $sql = "UPDATE users SET usersEmail='$email' WHERE id='$id';";
            $conn->query($sql);

            $sql = "UPDATE users SET usersPassword='$new_password' WHERE id='$id';";
            $conn->query($sql);

            $sql = "UPDATE users SET usersUsername='$new_username' WHERE id='$id';";
            $conn->query($sql);

            header("Location: ../php/account.php?id=$id");
            exit();

        }

        else{
            echo "Niste odabrali korisnika";
        }