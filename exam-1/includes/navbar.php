


<!DOCTYPE html>

<html lang="sr">
  <head>

        <title>Kupujem Prodajem</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    </head>

    <body>

        
            <div class="container cont">
                <div class="navigation-bar">

                    <div class="logo">
                        <img src="../images/logo.png" width="125px">
                    </div>

                    <nav>
                        <ul id="menu-items">
                        <?php
                                if(isset($_SESSION["usersUsername"])){
                                    
                                    echo "<li><a id='home' href='index.php'><i class='fa fa-home'></i>Početna strana</a></li>";
                                    if(($_SESSION["usersPrivileges"] == "admin")){
                                        echo "<li><a id='options' class='link' href='manage_accounts.php'><i class='fa fa-filter'></i>Opcije</a></li>";
                                        echo "<li><a id='out' class='link' href='../includes/signout.inc.php'>Odjavite se</a></li>";
                                    }

                                    else if(($_SESSION["usersPrivileges"] == "prodavac")){
                                        echo "<li><a id='options' class='link' href='../php/add_product.php'><i class='fa fa-bullhorn'></i>Postavi oglas</a></li>";
                                        echo "<li><a id='profile' class='link' href='../php/seller_profile.php'><i class='fa fa-user'></i>Profil</a></li>";
                                        echo "<li><a id='out' class='link' href='../includes/signout.inc.php'>Odjavite se</a></li>";
                                    }

                                    else{
                                        
                                        
                                        echo "<li><a id='profile' class='link' href='cart.php'><i class='fa fa-shopping-cart'></i>Korpa</a></li>";
                                        echo "<li><a id='out' class='link' href='../includes/signout.inc.php'>Odjavite se</a></li>";
                                    }
                                    
                                }

                                else{
                                    
                                    echo "<li><a id='home' class='link' href='index.php'><i class='fa fa-home'></i>Početna strana</a></li>";
                                    echo "<li><a id='log' class='link' href='login.php'><i class='fa fa-sign-out'></i>Prijavite se</a></li>";
                                    echo "<li><a id='reg' class='link' href='signup.php'>Registrujte se</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                    <img src="../images/menu.png" class="menu-icon" onclick="menuDrop()">
                </div>
            </div>
