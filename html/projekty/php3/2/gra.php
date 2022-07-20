<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Logowanie - Osadnicy</title>
        <meta name="description" content="Ta stroma opowiada o like me. Skusisz sie i przeczytasz?"/>
        <meta name="keywords" content="Super Tagi, Likeme"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <h2>Masz szczęście - jesteś człowiekiem. Róża jest piękna, ale nie wie dlaczego i dla kogo jest piękna.</h2>
        <?php
        echo "<p>Witaj ".$_SESSION['user'].'! <a href="logout.php">Wyloguj się</a></p>';
        echo "<p><b>Drewno: </b>".$_SESSION['drewno'];
        echo "<b> | Kamień: </b>".$_SESSION['kamien'];
        echo "<b> | Zboże: </b>".$_SESSION['zboze']."</p>";
        echo "<p><b>E-mail: </b>".$_SESSION['email']."</p>";
        echo "<p><b>DNI PREMIUM: </b>".$_SESSION['dnipremium']."</p>";
        ?>
    </body>
</html>
<!--<a href="kimjestem.html" target="_blank" class="medialink"></a>-->