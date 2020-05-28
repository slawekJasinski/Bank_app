<?php
session_start();
define('DB_NAME', 'wikomp_gr1');
define('DB_USER', 'wikomp_gr1');
define('DB_PASSWORD', 'BDWsB2021');
define('DB_HOST', 'localhost');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$_SESSION['error-trigger']=0;
if(isset($_POST['login'])){
    $username = $_POST['login'];
    $username = strtolower(stripcslashes($username));
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
    //$password = password_hash($password, PASSWORD_ARGON2ID);
}
$stmt = $conn->prepare("select id_klienta, dozwolone_logowanie, haslo from ebok where login=?");
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($id_klienta, $dozwolone_logowanie, $my_password);
$returnArray = array();
if(is_null($returnArray)) {
    $_SESSION['error-trigger']=1;
    $_SESSION['error']="Brak klienta w bazie!";
}
while ($stmt->fetch()) {
    if ($dozwolone_logowanie == 1){
        if($password==$my_password){
            $_SESSION['error-trigger']=-1;
            echo("Logowanie zakończone sukcesem");
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id_klienta;
            $_SESSION['success'] = "OK";
            header('location: pprodukty.php');
        }else{
            echo "nie";
        }
    }
}
$stmt->close();
$conn->close();
?>