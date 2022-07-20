<?php

    session_start();

    require_once "connect.php";
    if (!isset($_POST['login']) || !isset($_POST['haslo'])) {
        header('Location: index.php');
        exit();
    }
    
    $polaczenie = @new mysqli($host, $db_user, $db_pass, $db_name);
    
    if ($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }else{
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    
        //$sql = ;
        if ($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($polaczenie,$login),
        mysqli_real_escape_string($polaczenie,$haslo)))) {
            $numrows = $rezultat->num_rows;
            if($numrows==1){
                $_SESSION['zalogowany'] = true;
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['user'];
                $_SESSION['drewno'] = $wiersz['drewno'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['zboze'] = $wiersz['zboze'];
                $_SESSION['dnipremium'] = $wiersz['dnipremium'];
                $_SESSION['kamien'] = $wiersz['kamien'];
                unset($_SESSION['bladlogowania']);

                $rezultat->free_result();
                header('Location: gra.php');
            } else {
                $_SESSION['bladlogowania'] = '<span style="color:red;">Niepoprawny login lub hasło!</span>';
                header('Location: index.php');
            }
        }

        $polaczenie->close();
    }
?>