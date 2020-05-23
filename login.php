<?php
session_start();
$_SESSION['error-trigger']=0;
//$conn = mysqli_connect('localhost', 'root','','wikomp_gr1'); //połaczenie z baza
require_once('connect.php');
        //wyciągniecie wartości z indexu
if(isset($_POST['login'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    //sqlinjection
    $username = stripcslashes($username);
    //$password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = password_hash($password, PASSWORD_ARGON2ID);
    if(empty($username))
        $_SESSION['error-trigger']=1;
        $_SESSION['error']="Login nie został podany!";
    }
    if(empty($password)){
        $_SESSION['error-trigger']=1;
        $_SESSION['error']="Hasło nie zostało podane!";
    }
    $stmt = $conn -> prepare("SELECT * FROM `ebok` where login=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result() or die("Błąd logowania" . mysqli_error($conn));
    $verify = mysqli_fetch_array($result);
    if(is_null($verify)){
    $_SESSION['error-trigger']=1;
    $_SESSION['error']="Brak klienta w bazie!";
    }
    if($password=$verify['haslo'] && $verify['dozwolone_logowanie']==1){
        echo("Logowanie zakończone sukcesem");
        $_SESSION['username'] = $username;
        $_SESSION['id']=$verify['id_klienta'];
        $_SESSION['success']="OK";
        header('location: pprodukty.php');
    }
    else{
        if($verify['dozwolone_logowanie']==0){
            array_push($errors, "Konto zablokowane. Skontaktuj się z bankiem");
        }
        $_SESSION['error-trigger']=1;
        $_SESSION['error']="Brak klienta w bazie!";
        $correct = $verify['liczba_niepoprawnych_logowan']+1;
        $update_query = "UPDATE `ebok` SET liczba_niepoprawnych_logowan = '$correct' where login='$username'";
        $update_to_db = mysqli_query($conn, $update_query);
        if($correct==3 || $correct>3){
            $update_query = "UPDATE `ebok` SET dozwolone_logowanie = 0 where login='$username'";
            $update_to_db = mysqli_query($conn, $update_query);
        }
        header('location: Produkty.php');
}
?>
