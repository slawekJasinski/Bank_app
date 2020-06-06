<?php
//insert into adresy values(miasto, ulica, nr_domu, nr_mieszkania, kod_pocztowy, kraj)
//insert into adresy_klienci values(id_klienta, id_typu_adresu, id_adresu)
//insert into klienci values(pierwsze_imie, drugie_imie, nazwisko, pesel, id_dok_tozsamosci, numer_dok_tozsamosci)
require_once('connect.php');
$sql = select new_user_insert();
if ($result = $conn->query($sql)) {
    $conn->close();
    $user = $result->fetch_assoc();
    
}
//
//