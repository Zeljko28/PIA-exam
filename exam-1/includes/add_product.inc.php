<?php  

    session_start();


    if(isset($_POST['submit'])){
        require_once "./db.php";
        require_once "./functions.php";

        $name = $_POST['name'];
        $category = $_POST['category'];
        $cost = $_POST['cost'];
        $text = $_POST['text'];

        /*$target = '../images/'.basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];*/

        $num_of_rates = 0;
        $sum_of_rates = 0;

        $id = $_SESSION['usersId'];
        addProduct($conn, $id, $name, $category, $cost, $text);
    }