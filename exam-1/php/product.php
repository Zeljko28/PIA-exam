<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?> 

<?php 

    require_once "../includes/functions.php";
    require_once "../includes/db.php";


    if(isset($_GET['id'])){

        $id = $_GET['id'];
        show_product($conn, $id);

    }


?>


        


<?php
    include_once "../includes/footer.php";
?>