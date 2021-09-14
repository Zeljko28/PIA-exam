<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?> 
        
       
        <div class="small-container cart">
            <table>
                <tr>
                    <th>Proizvod</th>
                    <th>Kolicina</th>
                    <th>Cena</th>
                </tr>

                <?php 

                    require_once "../includes/functions.php";
                    require_once "../includes/db.php";

                    $uid = $_SESSION['usersId'];

                    show_cart($conn, $uid);

                ?>



        </div>

<?php
    include_once "../includes/footer.php";
?>