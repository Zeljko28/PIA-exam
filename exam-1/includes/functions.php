<?php

    /* Login funkcije */

    function emptyLoginInput($username, $password){
        if(empty($username) || empty($password)){
            return true;
        }
        else{
            return false;
        }
    }

    function invalidLogin($conn, $username, $password){
        $query = mysqli_query($conn, "SELECT * FROM users");

        $usernames = array();
        $emails = array();
        $passwords = array();
        $privileges = array();
        $privilege = "";
        $names = array();

        while($row = mysqli_fetch_array($query)){
            $usernames[] = $row['usersUsername'];
            $emails[] = $row['usersEmail'];
            $passwords[] = $row['usersPassword'];
            $privileges[] = $row['usersPrivileges'];
            $names[] = $row["usersFirstName"];
        }
        
        $result = "";

        $i = 0;
        for($i = 0; $i < sizeof($usernames); $i++){
            if($usernames[$i] === $username || $emails[$i] === $username){
                if($passwords[$i] === $password){
                    $privilege = $privileges[$i];
                    $name = $names[$i];
                    $result = $privilege;
                    break;
                }
            }
        }

        return $result;


    }


    /* Signup funkcije*/

    function emptySignupInput($firstName, $lastName, $email, $username, $password){
        if(empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)){
            return true;
        }
        else{
            return false;
        }
    }

    function invalidName($firstName){
        if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
            return true;
        }
        else {
            return false;
        }
    }

    function invalidLastName($lastName){
        if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
            return true;
        }
        else {
            return false;
        }
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }

    function usernameExist($conn, $username){
        $res = false;
        $arr = array();
        $usernames = "SELECT * FROM users";
        $query = mysqli_query($conn, $usernames);
        while($row = mysqli_fetch_array($query)){
            $arr[] = $row["usersUsername"];
        }

        $i = 0;
        for($i = 0; $i < sizeof($arr); $i++){
            if($arr[$i] == $username){
                $res = true;
                break;
            }
        }
        
        return $res;
        
    }


    function addUser($conn, $firstName, $lastName, $email, $username, $password, $privileges){
        $data = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUsername, usersPassword, usersPrivileges) VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$privileges')";

        mysqli_query($conn, $data);
    }




    function show_accounts($conn){
        $query = mysqli_query($conn, "SELECT * FROM users");

        echo '<table>';
        echo '<tr>';
            echo '<th>Informacije o korisniku</th>';
            echo '<th>Opcije</th>';
        echo '</tr>';

        while($row = mysqli_fetch_array($query)){
            if($row['usersPrivileges'] == "kupac" || $row['usersPrivileges'] == "prodavac"){
                $name = $row['usersFirstName'];
                $lastname = $row['usersLastName'];
                $type = $row['usersPrivileges'];
                $nickname = $row['usersUsername'];
                $id = $row["id"];

        
                    echo '<tr>';
                        echo '<td>';
                            echo '<div class="info">';
                                echo '<img src="../images/avatar.png">';
                                echo '<div>';
                                    echo "<p>$name $lastname</p>";
                                    echo "<small>Tip korisnika: $type</small>";
                                    echo '<br>';
                                            
                                echo '</div>';
                            echo '</div>';
                            
                        echo '</td>';
                                
                        echo '<td>';
                            
                                echo "<a id='delete-user' href='../includes/delete_user.inc.php?id=$id'>Obriši korisnika</a>";
                                echo '<br>';
                                echo "<a id='change-user-info' href='account.php?id=$id'>Izmeni podatke</a>";
                            
                        echo '</td>';
                                
            
                    echo '</tr>';
                
                
            }

        }

        echo '</table>';
    }


    function show_account_info($conn, $id){

        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

        while($row = mysqli_fetch_array($query)){

            $name = $row['usersFirstName'];
            $lastname = $row['usersLastName'];
            $username = $row['usersUsername'];
            $email = $row['usersEmail'];
            $password = $row['usersPassword'];

        }

        

            echo "<form action='../includes/update_user_info.inc.php?id=$id' method='post'>";
                echo "<h2> Osnovne informacije o korisniku </h2>";
                echo "<p id='lbl-name'>Ime</p>";
                echo "<input value='$name' name='first-name' id='name' type='text' autocomplete='off'>";

                echo "<p id='lbl-lastname'>Prezime</p>";
                echo "<input value='$lastname' name='last-name' id='lastname' type='text' autocomplete='off'>";

                echo "<p id='lbl-username'>Korisničko ime</p>";
                echo "<input value='$username' name='new-username' id='new-username' type='text' autocomplete='off'>";

                echo "<p id='lbl-new-password'>Lozinka</p>";
                echo "<input value='$password' name='new-password' type='password' id='new-password' autocomplete='off'>";
                echo "<br>";
                echo "<div class='chkbox'>";
                    echo "<input type='checkbox' id='input'>";
                    echo "<p>Prikaži lozinku</p>";
                echo "</div>";
                echo "<h2> Kontakt informacije </h2>";

                echo "<p id='lbl-email'>Email</p>";
                echo "<input value='$email' name='email' id='email' type='text' autocomplete='off'>";


                
                echo "<button type='submit' id='change'> Potvrdi izmene </button>";
            echo "</form>";
        

    }

    function show_product_info($conn, $pid){

        $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$pid'");

        while($row = mysqli_fetch_array($query)){

            $name = $row['productName'];
            $category = $row['productCategory'];
            $cost = $row['productCost'];
            $text = $row['productText'];
            $uid = $row['productUid'];

        }

        

            echo "<form action='../includes/update_product_info.inc.php?id=$pid' method='post'>";
                echo "<h2> Informacije o proizvodu </h2>";
                echo "<p id='lbl-name'>Naziv/Naslov</p>";
                echo "<input value='$name' name='name' id='name' type='text' autocomplete='off'>";

                echo "<p id='lbl-category'>Kategorija</p>";
                echo "<input value='$category' name='category' id='category' type='text' autocomplete='off'>";

                echo "<p id='lbl-cost'>Cena</p>";
                echo "<input value='$cost' name='new-cost' id='new-cost' type='text' autocomplete='off'>";

                echo "<p id='lbl-new-text'>Opis</p>";
                echo "<input value='$text' name='new-text' type='textarea' id='new-text' autocomplete='off'>";
                echo "<br>";
                
                echo "<button type='submit' id='change'> Potvrdi izmene </button>";
            echo "</form>";
        

    }


    function show_by_category($conn, $category){

        $sql = "SELECT  count(id) as cnt FROM products WHERE productCategory = '$category'";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $searchedNumProducts = $values['cnt'];

        $numberOfRows = $searchedNumProducts % 4;
        $numberOfColumns = 0;
        if($numberOfRows !== 0){
            $numberOfRows = (int)($searchedNumProducts / 4) + 1;
            $numberOfColumns = $searchedNumProducts;
        }
        else{
            $numberOfRows = (int)($searchedNumProducts / 4);
            $numberOfColumns = $searchedNumProducts;
        }


        
        $query = mysqli_query($conn, "SELECT * FROM products WHERE productCategory='$category'"); 

        $name = array();
        $cost = array();
        $uid = array();
        //$sum_of_rates = array();
        //$num_of_rates = array();
        $text = array();
        $image = array();
        $id = array();


        while($row = mysqli_fetch_array($query)){
            $name[] = $row['productName'];
            $cost[] = $row['productCost'];
            $uid[] = $row['productUid'];
            $text[] = $row['productText'];
            $image[] = $row['productImage'];
            $id[] = $row['id'];
        }


        $i = 0;
        $j = 0;
        $tmp = 0;
        $index = 0;

        if($numberOfColumns >= 4){
            $tmp = 4;
        }
        else{
            $tmp = $numberOfColumns;
        }

        if(sizeof($id) > 0){

            for ($i = 0; $i < $numberOfRows; $i++){
                echo "<div class='row'>";
                for($j = 0; $j < $tmp; $j++){
                    echo "<div class='col-4'>";
                        
                        echo "<a href='./product.php?id=$id[$j]'><img src='../images/products/$category/$id[$j].jpg'></a>";
                        echo '<div class="align">';
                            echo "<h4>$name[$j]</h4>";
                            echo '<div class="rating">';
                                echo '<i class="fa fa-star"></i>';
                                echo '<i class="fa fa-star"></i>';
                                echo '<i class="fa fa-star"></i>';
                                echo '<i class="fa fa-star"></i>';
                                echo '<i class="fa fa-star"></i>';
                            echo '</div>';
                            echo "<p>$cost[$j] RSD</p>";
                        echo "</div>";
                    echo "</div>";
                    $index++;
                }
                $numberOfColumns = $numberOfColumns - 4;
                if($numberOfColumns >= 4){
                    $tmp = 4;
                }
                else{
                    $tmp = $numberOfColumns;
                }
                echo "</div>";
            }
        }

        else{
            echo "<div class='rownot'>";
                echo "<h1>Nije pronadjen nijedan rezultat.</h1>";
            echo "</div>";
        }



    }

    function show_product($conn, $id){

        $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");


        while($row = mysqli_fetch_array($query)){

            $name = $row['productName'];
            $cost = $row['productCost'];
            $uid = $row['productUid'];
            $text = $row['productText'];
            $image = $row['productImage'];
            $category = $row['productCategory'];
            $id = $row['id'];
            $num_of_rates = $row['productNumOfRates'];
            $sum_of_rates = $row['productSumOfRates'];

        }

        if($num_of_rates == 0){
            $rate = "Još nije ocenjeno.";
        }

        else{
            $rate = $sum_of_rates/$num_of_rates;
            $floor = floor($rate);
            $rate_rem = $rate - $floor;
            $pt = 0;
        }


        echo '<div class="small-container one-product">';
            echo '<div class="row">';
                echo '<div class="col-2">';
                    echo "<img id='product-img' class='full' src='../images/products/$category/$id.jpg' >";

                    echo '<div class="small-img-row">';
                        echo '<div class="small-img-col">';
                            echo "<img class='small-img' src='../images/products/$category/$id.jpg' >";
                        echo '</div>';
                        echo '<div class="small-img-col">';
                            echo "<img class='small-img' src='../images/products/$category/$id.jpg' >";
                        echo '</div>';
                        echo '<div class="small-img-col">';
                            echo "<img class='small-img' src='../images/products/$category/$id.jpg' >";
                        echo '</div>';
                        echo '<div class="small-img-col">';
                            echo "<img class='small-img' src='../images/products/$category/$id.jpg' >";
                        echo '</div>';

                    echo '</div>';
                echo '</div>';
                echo '<div class="col-2">';
                    echo "<h1>$name</h1>";
                    echo "<h4>$cost RSD</h4>";

                    if(isset($_SESSION['usersPrivileges']) && $_SESSION['usersPrivileges'] == 'kupac'){
                        echo '<input type="number" value="1">';
                        echo "<a href='../includes/add_to_cart.inc.php?pid=$id' class='btn2'>Dodaj u korpu</a>";
                    }
                    echo '<h3>Opis proizvoda</h3>';
                    echo '<br>';
                    echo "<p>$text</p>";

                    echo '<h3 class="rate">Ocena</h3>';
                    echo '<div class="rating2">';
                        echo "<form id='rate' action='./includes/rate.php' method='post'>";

                            if($rate == "Još nije ocenjeno."){
                                echo "<p>Još nije ocenjeno.</p>";
                            }
                            else{
                                $i = 0;
                                for($i = 0; $i < $floor; $i++){
                                    $pt = $pt + 1;
                                    echo "<a href='../includes/update_rate.inc.php?stars=$pt&id=$id'><i id='star$pt' class='fa fa-star star$pt'></i></a>";
                                    
                                }
                                if($rate_rem != 0){
                                    $pt = $pt + 1;
                                    echo "<a href='../includes/update_rate.inc.php?stars=$pt&id=$id'><i id='star$pt' class='fas fa-star-half-alt star$pt'></i></a>";
                                    
                                }

                                if($pt < 5){
                                    $empty = 5 - $pt;
                                    for($i = 0; $i < $empty; $i++){
                                        $pt = $pt + 1;
                                        echo "<a href='../includes/update_rate.inc.php?stars=$pt&id=$id'><i id='star$pt' class='far fa-star star$pt'></i></a>";
                                    }
                                }
                            }
                        echo "</form>";
                    echo '</div>';

                echo '</div>';
            echo '</div>';
        echo '</div>';


    }


    function addProduct($conn, $id, $name, $category, $cost, $text){

        
        $data = "INSERT INTO products (productUid, productName, productCategory, productCost, productText) VALUES ('$id', '$name', '$category', '$cost', '$text')";

        if(mysqli_query($conn, $data)){
           
            header("Location: ../php/add_product.php");
        }

        else{
            echo "neuspesno";
        }

        /*if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            header("Location: ../index.php");
            $msg = "Image uploaded successcfully";
            echo $msg;
        }
        else{
            header("Location: ../profile.php");
            $msg = "Image NOT uploaded successcfully";
            echo $msg;
        }*/
    }



    function show_my_products($conn, $id){

        $query = mysqli_query($conn, "SELECT * FROM products WHERE productUid='$id'");

        echo '<table>';
        echo '<tr>';
            echo '<th>Informacije o proizvodu</th>';
            echo '<th>Opcije</th>';
        echo '</tr>';

        while($row = mysqli_fetch_array($query)){
                $pid = $row["id"];
                $name = $row['productName'];
                $category = $row['productCategory'];
                $cost = $row['productCost'];
                $text = $row['productText'];
                $id = $row['id'];
                

        
                    echo '<tr>';
                        echo '<td>';
                            echo '<div class="info">';
                                echo "<img src='../images/products/$category/$id.jpg'>";
                                echo '<div>';
                                    echo "<p>$name</p>";
                                    echo "<small>Kategorija: $category</small>";
                                    echo "<br>";
                                    echo "<small>Cena: $cost</small>";
                                    echo '<br>';
                                    echo "<small>ID: $pid</small>";
                                            
                                echo '</div>';
                            echo '</div>';
                            
                        echo '</td>';
                                
                        echo '<td>';
                            
                                echo "<a id='delete-ad' href='../includes/delete_product.inc.php?id=$pid'>Obriši oglas</a>";
                                echo '<br>';
                                echo "<a id='change-ad-info' href='change_product.php?pid=$pid'>Izmeni oglas</a>";
                            
                        echo '</td>';
                                
            
                    echo '</tr>';

        }

        echo '</table>';
    }



    function delete_user($conn, $id){
        $sql = "DELETE FROM users WHERE id='$id';";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../php/manage_accounts.php");
            exit();
        } else {
            echo "Korisnik ne može da se obriše " . $conn->error;
            exit();
        }
    }

    function delete_product($conn, $id){
        $sql = "DELETE FROM products WHERE id='$id';";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../php/seller_profile.php");
            exit();
        } else {
            echo "Proizvod ne može da se obriše " . $conn->error;
            exit();
        }
    }




    function search($conn, $search){

        $sql = "SELECT count(id) AS total FROM products";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $searchedNumProducts = $values['total'];

        $searchedNumProducts = 0;

        $query = mysqli_query($conn, "SELECT * FROM products");

        $ids = array();
        $names = array();
        $categories = array();
        $costs = array();
        $texts = array();

        $searchedIds = array();
        $searchedNames = array();
        $searchedCategories = array();
        $searchedCosts = array();
        $searchedTexts = array();

        while($row = mysqli_fetch_array($query)){
            $ids[] = $row['id'];
            $names[] = $row['productName'];
            $categories[] = $row['productCategory'];
            $costs[] = $row['productCost'];
            $texts[] = $row['productText'];
        }

        $i = 0;
        $j = 0;

        for($i = 0; $i < sizeof($ids); $i++){
            $test = strtolower($names[$i]);
            $test2 = strtolower($search);
            if(strpos($test, $test2) !== false){
                $searchedIds[$j] = $ids[$i];
                $searchedNames[$j] = $names[$i];
                $searchedCategories[$j] = $categories[$i];
                $searchedCosts[$j] = $costs[$i];
                $searchedTexts[$j] = $texts[$i];
                $searchedNumProducts++;
                $j++;
            }
        }

        
        if($searchedNumProducts == 0){
            echo "<h1>Nije pronadjen nijedan rezultat.</h1>";
            exit();
        }


        $numberOfRows = $searchedNumProducts % 4;
        $numberOfColumns = 0;
        if($numberOfRows !== 0){
            $numberOfRows = (int)($searchedNumProducts / 4) + 1;
            $numberOfColumns = $searchedNumProducts;
        }
        else{
            $numberOfRows = (int)($searchedNumProducts / 4);
            $numberOfColumns = $searchedNumProducts;
        }


        $i = 0;
        $j = 0;
        $tmp = 0;
        $index = 0;

        if($numberOfColumns >= 4){
            $tmp = 4;
        }
        else{
            $tmp = $numberOfColumns;
        }
        echo "<div class='row'>";
            echo "<h2>Rezultati pretrage za '$search'</h2>";
        echo "</div>";
        

        for ($i = 0; $i < $numberOfRows; $i++){
            echo "<div class='row'>";
            for($j = 0; $j < $tmp; $j++){
                echo "<div class='col-4'>";
                        
                    echo "<a href='./product.php?id=$searchedIds[$j]'><img src='../images/products/$searchedCategories[$j]/$searchedIds[$j].jpg'></a>";
                    echo "<h4>$searchedNames[$index]</h4>";
                    echo '<div class="rating">';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                        echo '<i class="fa fa-star"></i>';
                    echo '</div>';
                    echo "<p>$searchedCosts[$index] RSD</p>";
                    
                echo "</div>";
            
                $index++;
            }
            $numberOfColumns = $numberOfColumns - 4;
            if($numberOfColumns >= 4){
                $tmp = 4;
            }
            else{
                $tmp = $numberOfColumns;
            }
            echo "</div>";
        }
        
    }


    function show_cart($conn, $uid){
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$uid'");

        $cart = "";

        while($row = mysqli_fetch_array($query)){

            $cart = $row['usersCart'];
        }

        $products = explode(";", $cart);

        $vel = sizeof($products);
        
        /*header("Location: ../includes/test.php?products=$vel");*/

        $i = 0;
        $productId = $products[$i];

        $sum = 0;

        $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");

        while($row = mysqli_fetch_array($query)){

            $pid = $row["id"];
            $name = $row["productName"];
            $category = $row["productCategory"];
            $cost = $row["productCost"];
            $text = $row["productText"];

            echo "<tr>";
                    echo "<td>";
                        echo "<div class='product-info'>";
                            echo "<img src='../images/products/$category/$pid.jpg'>";
                            echo "<div>";
                                echo "<p>$name</p>";
                                echo "<small>Cena: $cost RSD</small>";
                                echo "<br>";
                                echo "<a href='../includes/delete_from_cart.inc.php?pid=$pid' class='btn2'>Ukloni iz korpe</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td><input type='number' value='1'></td>";
                    echo "<td>$cost RSD</td>";

                echo "</tr>";

            
            
            $i = $i + 1;
            if($vel > $i){
                $productId = $products[$i];
            
                $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");
                $sum = $sum + $cost;
            }

        }


        echo "<div class='total-cost'>";

            echo "<table>";
                echo "<tr>";
                    echo "<td>Ukupno</td>";
                    echo "<td>$sum RSD</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";

    }


    function add_to_cart($conn, $uid, $pid){

        $query = mysqli_query($conn, "SELECT usersCart FROM users WHERE id='$uid'");

        $cart = "";

        while($row = mysqli_fetch_array($query)){

            $cart = $row['usersCart'];
        }

        $cartArr = explode(";", $cart);

        $i = 0;

        $flag = true;

        $vel = sizeof($cartArr);
        

        for($i = 0; $i < $vel; $i++){
            if($pid == $cartArr[$i]){
                $flag = false;
            }
        }


        if($flag){
            $cart = $cart . "$pid;";

            $sql = "UPDATE users SET usersCart='$cart' WHERE id='$uid';";
            $conn->query($sql);
        }
    }

    function delete_from_cart($conn, $uid, $pid){

        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$uid'");

        $cart = "";

        while($row = mysqli_fetch_array($query)){

            $cart = $row['usersCart'];
        }

        $cartArr = explode(";" ,$cart);
        $cartArr2 = array();

        $vel = sizeof($cartArr);
        $vel = $vel - 1;

        $i = 0;
        $j = 0;

        /*$flag = false;

        for($i = 0; $i < sizeof($cartArr); $i++){
            for($j = 0; $j < sizeof($cartArr); $j++){
                if($cartArr[$i] == ca)
            }

        }

        $j = 0;*/

        for($i = 0; $i < $vel; $i++){
            if($pid != $cartArr[$i]){
                $cartArr2[$j] = $cartArr[$i];
                $j = $j + 1;
            }
        }

        $cart = "";
        
        for($i = 0; $i < sizeof($cartArr2); $i++){
                            
            $cart = $cart . "$cartArr2[$i];";
            
        }



        $sql = "UPDATE users SET usersCart='$cart' WHERE id='$uid';";
        $conn->query($sql);

    }


    function delete_cart($conn, $uid){
        $cart = "";

        $sql = "UPDATE users SET usersCart='$cart' WHERE id='$uid';";
        $conn->query($sql);
    }


    function updateRate($conn, $id, $stars){
        $num_of_ratings = 0;
        $sum_of_ratings = 0;

        $sql = "SELECT * FROM products WHERE id='$id';";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            
            $num_of_ratings = $row['productNumOfRates'];
            $sum_of_ratings = $row['productSumOfRates'];   
        }

        $num_of_ratings++;
        $sum_of_ratings = $sum_of_ratings + $stars;

        $sql = "UPDATE products SET productNumOfRates='$num_of_ratings', productSumOfRates='$sum_of_ratings' WHERE id='$id';";
        if(!$conn->query($sql)){
            echo $conn->error;
        }
    }



