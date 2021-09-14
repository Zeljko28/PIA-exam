<?php

    session_start();
?>

<?php
    include("../includes/navbar.php");
?>

    <div class="container cont">

        <?php 

            require_once "../includes/functions.php";
            require_once "../includes/db.php";


            if(isset($_GET['category'])){

                $category = $_GET['category'];
                show_by_category($conn, $category);

            }

            



        ?>
        

    </div>



<?php

    include("../includes/footer.php");
?>