<?php

    session_start();

    include_once "../includes/navbar.php";

?> 

    <div class="small-container search">

        <?php
            require_once "../includes/db.php";
            require_once "../includes/functions.php";

            if(isset($_POST['submit'])){

                $search = $_POST['search'];

                search($conn, $search);


            }

            else{
                header("Location: ./index.php");
            }
        ?>
    </div>

<?php
    include_once "../includes/footer.php";
?>