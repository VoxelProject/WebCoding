<?php
    session_start();
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: gra.php');
        exit();
    }
    if (!(isset($_SESSION['udanarejestracja']))){
        header('Location: index.php');
        exit();
    } else {
        unset($_SESSION['udanarejestracja']);
    }
    //usuwamy zmienne pamiętające wartości wrazie nieprzejścia walidacji
    if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
    if(isset($_SESSION['fr_akceptacja'])) unset($_SESSION['fr_akceptacja']);
    //usuwanie błędów
    if(isset($_SESSION['e_capt'])) unset($_SESSION['e_capt']);
    if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
    if(isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
    if(isset($_SESSION['e_mail'])) unset($_SESSION['e_mail']);
    if(isset($_SESSION['e_haslo2'])) unset($_SESSION['e_haslo2']);
    if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
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
        <h2>Udało ci się zarejestrować!!! Gratuluje to nie lada wyczyn</h2>
        <h1>Teraz możesz się <a href="index.php">ZALOGOWAĆ O TUTAJ</a></h1>
        
    </body>
</html>
<!--<a href="kimjestem.html" target="_blank" class="medialink"></a>-->