<?php
session_start();
require_once('../connect.php');
require_once('../functions.php');
$_SESSION['error-trigger'] = 0;
//wyciągniecie wartości z indexu
if (isset($_POST['login'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //sqlinjection
    if (empty($username)) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Login nie został podany!";
    }
    if (empty($password)) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Hasło nie zostało podane!";
    }
    $sql = sprintf("SELECT * FROM `uzytkownicy` WHERE login='%s'", mysqli_real_escape_string($conn, $username));
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $user = $result->fetch_assoc();
            $passdb = $user['haslo'];
            $dozwolone_logowanie=$user['czy_aktywny'];
            if ($password == $passdb && $dozwolone_logowanie==1) {
                echo("Logowanie zakończone sukcesem");
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user['id_uzytkownika'];
                $_SESSION['success'] = "OK";
                //header('location: admin_main_page.php');
                header('location: admin_panel.php');
            } else {
                if ($dozwolone_logowanie == 0) {
                    $_SESSION['error-trigger'] = 1;
                    $_SESSION['error'] = "Konto nie jest aktywne";
                } else {
                    $_SESSION['error-trigger'] = 1;
                    $_SESSION['error'] = "Błedne hasło";
                    }
                ?>
                <script>
                    history.back()
                </script>
                <?php
                }
            }
        }
    }
?>