<?php
    session_start();
?>

<?php
    include_once "../includes/navbar.php";
?>

    
        <div class="small-container add">

            <h2 >Dodajte proizvod</h2> 

            <form action="../includes/add_product.inc.php" method="post">
                <p id="lbl-name">Unesite ime proizvoda</p>
                <input name="name" id="name" type="text" autocomplete="off">

                <p id="lbl-new-category">Odaberite kategoriju</p>
                <select id="category" name="category">                      
                    <option value="Alati i oruđa">Alati i oruđa</option>
                    <option value="Antikviteti">Antikviteti</option>
                    <option value="Automobili">Automobili</option>
                    <option value="Bela tehnika">Bela tehnika</option>
                    <option value="Bicikli">Bicikli</option>
                    <option value="Dvorište i bašta">Dvorište i bašta</option>
                    <option value="Elektronske komponente">Elektronske komponente</option>
                    <option value="Građevinarstvo">Građevinarstvo</option>
                    <option value="Igračke i igre">Igračke i igre</option>
                    <option value="Industrijska oprema">Industrijska oprema</option>
                    <option value="Knjige">Knjige</option>
                    <option value="Kompjuteri">Kompjuteri</option>
                    <option value="Konzole i igrice">Konzole i igrice</option>
                    <option value="Kućni ljubimci">Kućni ljubimci</option>
                    <option value="Lov i ribolov">Lov i ribolov</option>
                    <option value="Mobilni telefoni">Mobilni telefoni</option>
                    <option value="Motorcikli">Motorcikli</option>
                    <option value="Muzika i instrumenti">Muzika i instrumenti</option>
                    <option value="Nameštaj">Nameštaj</option>
                    <option value="Nakit, satovi...">Nakit, satovi...</option>
                    <option value="Nekretnine">Nekretnine</option>
                    <option value="Obuća">Obuća</option>
                    <option value="Odeća">Odeća</option>
                    <option value="Plovni objekti">Plovni objekti</option>
                    <option value="Poljoprivreda">Poljoprivreda</option>
                    <option value="Sport i razonoda">Sport i razonoda</option>
                    <option value="TV i video">TV i video</option>
                    <option value="Ugostiteljstvo">Ugostiteljstvo</option>


                </select>

                <p id="lbl-cost">Unesite cenu proizvoda</p>
                <input name="cost" id="cost" type="text" autocomplete="off">

                <p id="lbl-text">Unesite opis</p>
                <input name="text" type="text" id="text" autocomplete="off">

                <label for="file" id="lbl-img">Odaberite sliku</label>
                <input type="file" name="image" id="file">

                <button id="submit" name="submit" type="submit" class="btn">Potvrdi</button>
            </form>
        </div>
    

<?php
    include_once "../includes/footer.php";
?>