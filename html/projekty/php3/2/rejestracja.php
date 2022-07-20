<?php
    session_start();
    require_once "connect.php";
    if(isset($_POST['email'])){
        //udanawalidacja
        $wszystko_OK=true;
        //sprawdź poprawność nickname
        $nick = $_POST['nick'];
        //długość nikcka
        if((strlen($nick)<3) || (strlen($nick)>20)) {
            $wszystko_OK=false;
            $_SESSION['e_nick']='Nick musi posiadać od 3-20 znaków';
        }
        //
        if(ctype_alnum($nick)==false){
            $wszystko_OK=false;
            $_SESSION['e_nick']='Nick maże składać się tylko z liter i cyfr(bez polskich znaków)';
        }
        //sprawdź email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email)){
            $wszystko_OK=false;
            $_SESSION['e_mail']='Nie prawidłowy mail, proszę podaj poprawny';
        }
        //hasło
        $haslo = $_POST['pass'];
        $haslo2 = $_POST['haslo2'];
        if((strlen($haslo)<1)|| (strlen($haslo)>20)){
            $wszystko_OK=false;
            $_SESSION['e_haslo']='Hasło musi mieć do 8 do 20 znaków';
        }
        if($haslo!=$haslo2){
            $wszystko_OK=false;
            $_SESSION['e_haslo2']='Hasła muszą być identyczne';
        }
        $haslo_hash = password_hash('qwerty', PASSWORD_DEFAULT);

        //akceptcja regulaminu
        if(!isset($_POST['akceptacja'])){
            $wszystko_OK=false;
            $_SESSION['e_regulamin']='Nie zaakceptowałeś regulaminu!';
        }
        //bot or not
        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRET_KEY.'&response='.$_POST['g-recaptcha-response']);
        $odpowiedz =json_decode($sprawdz);
        if($odpowiedz->success==false){
            $wszystko_OK=false;
            $_SESSION['e_capt']='Nie zaznaczyłeś captcha poprawnie!';
        }
        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_haslo1'] = $haslo;
        $_SESSION['fr_haslo2'] = $haslo2;
        if(isset($_POST['akceptacja'])){
            $_SESSION['fr_akceptacja'] = true;
        }
        //czy email jest w bazie?
        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
        $polanczenie = new mysqli($host, $db_user, $db_pass, $db_name);
            if($polanczenie->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }else{
                //Czy imeil jóż istnieje?
                $rezultat = $polanczenie->query("SELECT id FROM `uzytkownicy` WHERE email='$email'");
                if(!$rezultat) throw new Exception($polanczenie->error);
                $whenmail = $rezultat->num_rows;
                if($whenmail>0){
                    $wszystko_OK = false;
                    $_SESSION['e_mail'] = "Istnieje jóż konto przypisane do tego e-maila!";
                }
                //Czy nick jóż istnieje?
                $rezultat = $polanczenie->query("SELECT id FROM `uzytkownicy` WHERE user='$nick'");
                if(!$rezultat) throw new Exception($polanczenie->error);
                $whennick = $rezultat->num_rows;
                if($whennick>0){
                    $wszystko_OK = false;
                    $_SESSION['e_nick'] = "Istnieje jóż konto o takim nicku!";
                }
                //końcowa walidacja
                if($wszystko_OK==true){
                    //Wszystko zaliczzone
                    if($polanczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 100, 100, 100, 14)")){
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
                    } else {
                        throw new Exception($polanczenie->error);
                    }
            
                }
                $polanczenie->close();
            }
        }catch(Exception $e){
            echo '<span class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestracje w innym terminie!</span>';
            echo '<br/><span class="error">Info development: '.$e.'</span>';
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Rejestracja - Osadnicy</title>
        <meta name="description" content="To gra osadnicy. MMO-RPG z otwarym światem. Nie możesz nie zagrać!!! Czy spróbujesz?"/>
        <meta name="keywords" content="Super Tagi, Likeme, osadnicy"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <div id="pasekloginow"><a href="index.php">Logowanie</a> <a href="rejestracja.php">Rejestracja</a></div>
        <h2>Masz szczęście - jesteś człowiekiem. Róża jest piękna, ale nie wie dlaczego i dla kogo jest piękna.</h2>
        <h1>Rejestracja</h1>
        <form method="post">
            Nickname: <input type="text" value="<?php if(isset($_SESSION['fr_nick'])){echo $_SESSION['fr_nick'];unset($_SESSION['fr_nick']);}?>" name="nick"/><br/>
<?php
if (isset($_SESSION['e_nick'])){
    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
    unset($_SESSION['e_nick']);
}
?>
            Email: <input type="text" value="<?php if(isset($_SESSION['fr_email'])){echo $_SESSION['fr_email'];unset($_SESSION['fr_email']);}?>" name="email"/><br/>
<?php
if (isset($_SESSION['e_mail'])){
    echo '<div class="error">'.$_SESSION['e_mail'].'</div>';
    unset($_SESSION['e_mail']);
}
?>
            Hasło: <input type="password" value="<?php if(isset($_SESSION['fr_haslo1'])){echo $_SESSION['fr_haslo1'];unset($_SESSION['fr_haslo1']);}?>" name="pass"/><br/>
<?php
if (isset($_SESSION['e_haslo'])){
    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
    unset($_SESSION['e_haslo']);
}
?>
            Powtórz hasło: <input type="password" value="<?php if(isset($_SESSION['fr_haslo2'])){echo $_SESSION['fr_haslo2'];unset($_SESSION['fr_haslo2']);}?>" name="haslo2"/><br/>
<?php
if (isset($_SESSION['e_haslo2'])){
    echo '<div class="error">'.$_SESSION['e_haslo2'].'</div>';
    unset($_SESSION['e_haslo2']);
}
?>
            <label>
                <input id="checkbox" type="checkbox" name="akceptacja"<?php if(isset($_SESSION['fr_akceptacja'])){echo "checked";unset($_SESSION['akceptacja']);}?>/> Akceptuj <a href="#">regulamin</a>
            </label>
<?php
if (isset($_SESSION['e_regulamin'])){
    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
    unset($_SESSION['e_regulamin']);
}
?>          <br/>
            <div class="g-recaptcha" data-sitekey='<?php echo SITE_KEY; ?>'></div>
<?php
if (isset($_SESSION['e_capt'])){
    echo '<div class="error">'.$_SESSION['e_capt'].'</div>';
    unset($_SESSION['e_capt']);
}
?>
            <input value="Zarejestruj się" type="submit"/>
        </form>
    </body>
</html>
<!--<a href="kimjestem.html" target="_blank" class="medialink"></a>-->