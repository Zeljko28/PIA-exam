<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?> 
    <div class="small-container product-information">
        <?php
            require_once "../includes/db.php";
            require_once "../includes/functions.php";

            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                show_product_info($conn, $pid);
            }

            else{
                header("Location: ./seller_profile.php");
            }

        ?>
    </div>



<?php
    include_once "../includes/footer.php";
?>