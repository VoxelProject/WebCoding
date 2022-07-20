<?php
    session_start();
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: gra.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Logowanie - Osadnicy</title>
        <meta name="description" content="To gra osadnicy. MMO-RPG z otwarym światem. Nie możesz nie zagrać!!! Czy spróbujesz?"/>
        <meta name="keywords" content="Super Tagi, Likeme, osadnicy"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div id="pasekloginow"><a href="index.php">Logowanie</a> <a href="rejestracja.php">Rejestracja</a></div>
        <?php
        if(isset($_SESSION['olo'])){ echo $_SESSION['olo'];
        unset($_SESSION['olo']);}
        ?>
        <h2>Masz szczęście - jesteś człowiekiem. Róża jest piękna, ale nie wie dlaczego i dla kogo jest piękna.</h2>
        <h1>Logowanie</h1>
        <form action="zaloguj.php" method="post">
            Login: <br> <input name="login" type="text"/><br>
            Hasło: <br> <input name="haslo" type="password"/><br>
            <input type="submit" value="Loguj"/>
        </form>
<?php
if(isset($_SESSION['bladlogowania'])) echo $_SESSION['bladlogowania'];
?>
    </body>
</html>
<!--<a href="kimjestem.html" target="_blank" class="medialink"></a>-->