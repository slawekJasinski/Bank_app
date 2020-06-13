<?php
session_start();
require_once('connect.php');
require_once('functions.php');
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
        header('index.php');
    }
    if (empty($password)) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Hasło nie zostało podane!";
        header('index.php');
    }
    $sql = sprintf("SELECT * FROM `ebok` WHERE login='%s'", mysqli_real_escape_string($conn, $username));
    if ($result = $conn->query($sql)) {
        $count = $result->num_rows;
        if ($count == 1) {
            $user = $result->fetch_assoc();
            $passdb = $user['haslo'];
            $dozwolone_logowanie = $user['czy_dozwolone_logowanie'];
            if ($password == $passdb && $dozwolone_logowanie == 1) {
                echo("Logowanie zakończone sukcesem");
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user['id_klienta'];
                $_SESSION['success'] = "OK";
                header('location: main_page.php');
            } else {
                if ($dozwolone_logowanie == 0) {
                    $_SESSION['error-trigger'] = 1;
                    $_SESSION['error'] = "Konto jest zablokowane";

                } else {
                    $_SESSION['error-trigger'] = 1;
                    $_SESSION['error'] = "Błędne hasło!";
                    $correct = $user['liczba_niepoprawnych_logowan'] + 1;
                    $update_query = "UPDATE `ebok` SET liczba_niepoprawnych_logowan = '$correct' where login='$username'";
                    $update_to_db = mysqli_query($conn, $update_query);
                    if ($correct == 3 || $correct > 3) {
                        $update_query2 = "UPDATE `ebok` SET czy_dozwolone_logowanie = '0' where login='$username'";
                        $update_to_db = mysqli_query($conn, $update_query2);
                        $update_query3 = "UPDATE `ebok` SET liczba_niepoprawnych_logowan = '0' where login='$username'";
                        $update_to_db = mysqli_query($conn, $update_query3);
                    }
                    ?>
                    <script>
                        history.back()
                    </script>
                    <?php
                }
            }
        } else {
            $_SESSION['error-trigger'] = 1;
            $_SESSION['error'] = "Konto jest zablokowane";
            header('index.php');
        }
    }
}
?>