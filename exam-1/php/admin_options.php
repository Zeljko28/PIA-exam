<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?>
    <div class="container admin-options">
        <?php
            
            require_once "../includes/functions.php";

            if($_SESSION["usersPrivileges"] == "admin"){
                echo "<div class='row option'>";
                    echo "<a href='./manage-accounts.php'> Upravljajte korisnicima </a>";
                echo "</div>";

            }

        ?>
    </div>


<?php
    include_once "../includes/footer.php";
?>