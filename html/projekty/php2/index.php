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