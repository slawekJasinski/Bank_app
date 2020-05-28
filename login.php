<?php
session_start();
$_SESSION['error-trigger']=0;
$conn = mysqli_connect('localhost', 'wikomp_gr1', 'BDWsB2021', 'wikomp_gr1');
//wyciągniecie wartości z indexu
if(isset($_POST['login'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    //sqlinjection
    if (empty($username)) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Login nie został podany!";
    }
    if (empty($password)) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Hasło nie zostało podane!";
    }
    $sql = sprintf("SELECT * FROM `ebok` WHERE login='%s'", mysqli_real_escape_string($conn, $username));
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if($count == 1) {
            $user = $result->fetch_assoc();
            $passdb = $user['haslo'];
            if ($password==$passdb) {
                echo("Logowanie zakończone sukcesem");
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user['id_klienta'];
                $_SESSION['success'] = "OK";
                header('location: pprodukty.php');
            } else {
                if ($user['dozwolone_logowanie'] == 0) {
                    $_SESSION['error-trigger'] = 1;
                    $_SESSION['error'] = "Konto zablokowane. Skontaktuj się z bankiem";
                }else{
                $_SESSION['error-trigger'] = 1;
                $_SESSION['error'] = "Brak klienta w bazie!";
                $correct = $user['liczba_niepoprawnych_logowan'] + 1;
                $update_query = "UPDATE `ebok` SET liczba_niepoprawnych_logowan = '$correct' where login='$username'";
                $update_to_db = mysqli_query($conn, $update_query);
                if ($correct == 3 || $correct > 3) {
                    $update_query = "UPDATE `ebok` SET dozwolone_logowanie = 0 where login='$username'";
                    $update_to_db = mysqli_query($conn, $update_query);
                }
                header('location: Produkty.php');
                }
            }
        }
    }
}
?>