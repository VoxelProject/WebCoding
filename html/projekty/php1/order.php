<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Podsumowanie zamówienia</title>
        <meta name="description" content="Ta stroma opowiada o like me. Skusisz sie i przeczytasz?"/>
        <meta name="keywords" content="Super Tagi, Likeme"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <style>
            body{/*patern with www.topcal.com/designes/subtlepatterns*/
            background-image: url("https://www.toptal.com/designers/subtlepatterns/uploads/double-bubble-dark.png");color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        </style>
    </head>
    <body>
        <?php
        $paczek = $_POST['paczek'];
        $grzebien = $_POST['grzebien'];
        $suma = 0.99*$paczek + $grzebien*1.29;
        echo "<h2>Podsumowanie zamówienia</h2>";
echo<<<END
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>Pączek (0.99PLN/szt)</td> <td>$paczek</td>
    </tr>
    <tr>
        <td>Grzebień (1.29PLN/szt)</td> <td>$grzebien</td>
    </tr>
    <tr>
        <td>SUMA</td> <td>$suma PLN</td>
    </tr>
    </table>
    <br><a href="index.php">POWRÓT</a>
END;
?>
    </body>
</html>