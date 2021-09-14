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
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
        
    </head>

    <body>

        <div class="container login">

            <div class="col-md-6 left">
                <form action="../includes/login.inc.php" method="post">
                    <h2>Prijavite se</h2>
                    <hr>
                    <label>Korisničko ime ili email:</label>
                    <input name="username" id="username" class="form-control" type="text" autocomplete="off">

                    <label>Lozinka:</label>
                    <input name="password" id="password" class="form-control" type="password" autocomplete="off">

                    <button name="submit" type="submit">Prijavite se</button>
                </form>
                <p>Nemate nalog? <a href="signup.php">Registrujte se</a></p>
            </div>

            <div class="col-md-6 right">
                <h2>Prednosti posedovanja naloga</h2>
                <hr>
                <h4>Mogućnost kupovine, prodaje...</h4>
                <p>Posedovanjem naloga na našem sajtu, stičete pravo na kupovinu ili prodaju.</p>

                <h4>Ocenjivanje artikala, komentari...</h4>
                <p>Registracijom na našem sajtu, dobijate pun korisnički doživljaj. Možete ocenjivati i komentarisati sve artikle na sajtu.</p>

                <h4>Doprinosite sajtu.</h4>
                <p>Ocenjivanjem,komentarisanjem, a i samim posedovanjem naloga, doprinosite sajtu.</p>
            </div>
        
        </div>


    </body>

</html>