<!DOCTYPE html>

<html lang="sr">
  <head>

        <title>Prijava - KupujemProdajem</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/signup.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    </head>

    <body>
        <div class="container signup">
            <h2>Registrujte se</h2>

            <hr>

            <form action="../includes/signup.inc.php" method="post">
                <label id="lbl-name">Unesite ime</label>
                <input name="first-name" id="name" class="form-control" type="text" autocomplete="off">

                <label id="lbl-surname">Unesite prezime</label>
                <input name="last-name" id="surname" class="form-control" type="text" autocomplete="off">

                <label id="lbl-email">Email</label>
                <input name="email" id="email" class="form-control" type="text" autocomplete="off">

                <label id="lbl-new-username">Korisničko ime</label>
                <input name="new-username" id="new-username" class="form-control" type="text" autocomplete="off">

                <label id="lbl-new-password">Lozinka</label>
                <input name="new-password" type="password" id="new-password" class="form-control" autocomplete="off">

                <label id="lbl-new-type">Odaberite tip korisnika</label>
                <select id="tip" name="tip">                      
                    <option value="kupac">Kupac</option>
                    <option value="prodavac">Prodavac</option>
                </select>

                <hr>

                <button id="submit" name="submit" type="submit">Potvrdi</button>
            </form>

            <p id="pback">Već imate nalog? <a id="back" href="login.php">Prijavite se</a></p>
        </div>

    </body>

</html>