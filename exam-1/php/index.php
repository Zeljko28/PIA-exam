<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>

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


        <div class="header">

            <div class="cont">
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
                                        echo "<li><a id='options' class='link' href='add_product.php'><i class='fa fa-bullhorn'></i>Postavi oglas</a></li>";
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
                

                <div class="row">

                    <div class="col-2">
                        <h1>Dobrodošli na <br>Kupujem Prodajem!</h1>
                        <p>Pronađite bilo sta sta vam treba. <br>Registrujte se brzo i lako!</p>
                        <form action="./search.php" method="post">
                            <input id="search" type="text" name="search"><button class="btn" name="submit" type="submit">Pretraži <i class='fa fa-arrow-right'></i></button>
                        </form>
                    </div>

                    <div class="col-2">
                        <img src="../images/ecomm.png" alt="slika">

                    </div>
                
                </div>


            </div>
        </div>




        <div class="categories">
            <div class="small-container">
                <h2 class="title">Najtrazenije kategorije</h2>
                <div class="row">
                    <div class="col-3">
                        <img src="../images/categories/odeca.png" title="Odeca">
                        <a href="show_category.php?category=Odeća"><div class="image-overlay">
                            <div class="image-title">Odeća</div>
                        </div></a>
                    </div>

                    <div class="col-3">
                        <img src="../images/categories/obuca.png">
                        <a href="show_category.php?category=Obuća"><div class="image-overlay">
                            <div class="image-title">Obuća</div>
                        </div></a>
                    </div>

                    <div class="col-3">
                        <img src="../images/categories/racunari.jpg">
                        <a href="show_category.php?category=Kompjuteri"><div class="image-overlay">
                            <div class="image-title">Računari <br> i oprema</div>
                        </div></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="small-container">
            <h2 class="title">Najpopularniji proizvodi</h2>
            <div class="row">
                <div class="col-4">
                    <a href="product.php?id=13"><img src="../images/products/Kompjuteri/13.jpg"></a>
                    <h4>Desktop računar Altos Panter</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>79990 RSD</p>
                </div>

                <div class="col-4">
                    <a href="product.php?id=19"><img src="../images/products/Odeća/19.jpg"></a>
                    <h4>Crvena Majica</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>1500 RSD</p>
                </div>

                <div class="col-4">
                    <a href="product.php?id=25"><img src="../images/products/Muzika i instrumenti/25.jpg"></a>
                    <h4>Akustična gitara Rosen</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>7590 RSD</p>
                </div>

                <div class="col-4">
                    <a href="product.php?id=22"><img src="../images/products/Obuća/22.jpg"></a>
                    <h4>Ellesse Cipele</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>14000 RSD</p>
                </div>
            </div>
        </div>


        <?php

            require_once "../includes/footer.php";
        ?>