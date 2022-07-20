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
        <style>
            body{/*patern with www.topcal.com/designes/subtlepatterns*/
            background-image: url("https://www.toptal.com/designers/subtlepatterns/uploads/double-bubble-dark.png");color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        </style>
    </head>
    <body>
        <h2>Tylko martwi ujrzeli koniec wojny - Platon</h2>
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