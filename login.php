<?php
session_start();
$conn = mysqli_connect('localhost', 'root','','wikomp_gr1'); //połaczenie z baza
        //wyciągniecie wartości z indexu
if(isset($_POST['login'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    //sqlinjection
    $username = stripcslashes($username);
    //$password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    //$password = mysqli_real_escape_string($conn, $password);
    $sql = "SELECT * FROM `ebok` where login='$username'";
    if(empty($username)){
        array_push($errors, "Wymagany login");
    }
    if(empty($password)){
        array_push($errors, "Wymagane hasło");
    }
    if(is_null($sql)){
        array_push($errors, "Brak takiego klienta");
    }
    $result = mysqli_query($conn, $sql) or die("Błąd logowania" . mysqli_error($conn));
    $verify = mysqli_fetch_array($result);
    if($verify['haslo']==md5($username.$password) && $verify['dozwolone_logowanie']==1){
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
        array_push($errors, "Bład");
        header('location: Produkty.php');
        $correct = $verify['liczba_niepoprawnych_logowan']+1;
        $update_query = "UPDATE `ebok` SET liczba_niepoprawnych_logowan = '$correct' where login='$username'";
        $update_to_db = mysqli_query($conn, $update_query);
        if($correct==3 || $correct>3){
            $update_query = "UPDATE `ebok` SET dozwolone_logowanie = 0 where login='$username'";
            $update_to_db = mysqli_query($conn, $update_query);
        }
        // sql zwiększajacy liczbe błędow o 1
    }

}
?>
