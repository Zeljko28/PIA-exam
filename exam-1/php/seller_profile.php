<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?>
    <div class="small-container manage-ads">
        <?php
            require_once "../includes/db.php";
            require_once "../includes/functions.php";


            if($_SESSION["usersPrivileges"] == "prodavac"){

                echo "<div class='row'>";
                    echo "<h2> Uredite svoje proizvode </h2>";
                echo "</div>";
            }

            $id = $_SESSION["usersId"];

            show_my_products($conn, $id);


        ?>
    </div>


<?php
    include_once "../includes/footer.php";
?>