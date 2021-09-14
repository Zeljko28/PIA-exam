<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?> 
    <div class="small-container information">
        <?php
            require_once "../includes/db.php";
            require_once "../includes/functions.php";

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                show_account_info($conn, $id);
            }

            else{
                header("Location: ./manage_accounts.php");
            }

        ?>
    </div>



<?php
    include_once "../includes/footer.php";
?>