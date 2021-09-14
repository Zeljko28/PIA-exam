<?php 

    
        if(isset($_GET["id"])){

            $pid = $_GET["id"];
            $name = $_POST["name"];
            $category = $_POST["category"];
            $cost = $_POST["new-cost"];
            $text = $_POST["new-text"];
            

            require_once "./db.php";
            require_once "./functions.php";

            $sql = "UPDATE products SET productName='$name' WHERE id='$pid';";
            $conn->query($sql);

            $sql = "UPDATE products SET productCategory='$category' WHERE id='$pid';";
            $conn->query($sql);

            $sql = "UPDATE products SET productCost='$cost' WHERE id='$pid';";
            $conn->query($sql);

            $sql = "UPDATE products SET productText='$text' WHERE id='$pid';";
            $conn->query($sql);

            header("Location: ../php/change_product.php?pid=$pid");
            exit();

        }

        else{
            echo "Niste odabrali korisnika";
        }