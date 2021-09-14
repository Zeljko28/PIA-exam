<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?> 

    

        

       

        <div id="delete" class="small-container manage">
        
            <?php
                require_once "../includes/db.php";
                require_once "../includes/functions.php";

                show_accounts($conn);

                

            ?>

        </div>



<?php
    include_once "../includes/footer.php";
?>