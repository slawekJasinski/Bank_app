<?php
//insert into adresy values(miasto, ulica, nr_domu, nr_mieszkania, kod_pocztowy, kraj)
//insert into adresy_klienci values(id_klienta, id_typu_adresu, id_adresu)
//insert into klienci values(pierwsze_imie, drugie_imie, nazwisko, pesel, id_dok_tozsamosci, numer_dok_tozsamosci, wstawiajacy, login, haslo)
session_start();
require_once('functions.php');
require_once('connect.php');
$sender = $_SESSION['id'];
if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['second_name'])){
    $second_name = $_POST['second_name'];
}
if(isset($_POST['surname'])){
    $surname = $_POST['surname'];
}
if(isset($_POST['pesel'])){
    $pesel = $_POST['pesel'];
}
if(isset($_POST['id_type'])){
    $id_type = $_POST['id_type'];
}
if(isset($_POST['id_number'])){
    $id_number = $_POST['id_number'];
}
if(isset($_POST['system_id'])){
    $system_id = $_POST['id'];//$_POST['id_number'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
if(isset($_POST['email2'])){
    $email2 = $_POST['email2'];
}
if(isset($_POST['password2'])){
    $password2 = $_POST['password2'];
}
if($email==$email2 && $password==$password2) {
    //$sql = "SET @p0='?'; SET @p1='?'; SET @p2='?'; SET @p3='?'; SET @p4='?'; SET @p5='?'; SET @p6='?'; SET @p7='?'; SET @p8='?'; SELECT `dodaj_klienta`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8) AS `dodaj_klienta`;";
    //$sql = "SELECT `dodaj_klienta`('?', '?', '?', '?', '?', '?', '?', '?', '?') AS `dodaj_klienta`;";
    $sql = "SELECT `dodaj_klienta`('$name', '$second_name', '$surname', '$pesel', '$id_type', '$id_number', '$sender', '$email', '$password') AS `dodaj_klienta`;";
    if ($stmt = $conn->query($sql)) {
        echo "Udalo sie!";
    } else {
        ?>

        <?php
    }
}
if(isset($_POST['city'])){
    $city = $_POST['city'];
}
if(isset($_POST['street'])){
    $street = $_POST['street'];
}
if(isset($_POST['house'])){
    $house = $_POST['house'];
}
if(isset($_POST['apartment'])){
    $apartment = $_POST['apartment'];
}
if(isset($_POST['code'])){
    $code = $_POST['code'];
}
if(isset($_POST['country'])){
    $country = $_POST['country'];
}
if($password==$password2) {
    //$sql = "SET @p0='?'; SET @p1='?'; SET @p2='?'; SET @p3='?'; SET @p4='?'; SET @p5='?'; SET @p6='?'; SET @p7='?'; SELECT `dodaj_adres_klienta`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7) AS `dodaj_adres_klienta`;";
    $sql = "SELECT `dodaj_adres_klienta`('$city', '$street', '$house', '$apartment', '$code', '$country') AS `dodaj_adres_klienta`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
        }
    }
            else {

        }
}
?>
