<?php
require_once('connect.php');
function is__account_number_correct($account_number)
{
    if (empty($account_number) && strlen($account_number) != 26) {
        $_SESSION['error-trigger'] = 1;
        $_SESSION['error'] = "Błędny nr konta!";
        return false;
    } else {
        return true;
    }
}
function is_cvv_correct($cvv_from_user, $cvv_from_system){
    if($cvv_from_system==$cvv_from_user){
        return true;
    }else{
        return false;
    }
}
function saldo($nr){
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $sql = sprintf("SELECT `saldo_rachunku`('%s') AS `saldo_rachunku`;", mysqli_real_escape_string($conn, $nr));
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
            return $amount['saldo_rachunku'];
        }
    }
}
function dostepne_srodki($nr){
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $sql = sprintf("SELECT `dostepne_srodki_rachunku`('%s') AS `dostepne_srodki_rachunku`;", mysqli_real_escape_string($conn, $nr));
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
            return $amount['dostepne_srodki_rachunku'];
            }
        }
}
function make_transfer($date, $nr_rachunku, $nadawca, $na_rachunek, $odbiorca, $adres_odbiorcy, $tytul, $kwota){
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $sql = "SET @p0='2020-01-01'; SET @p1='01100052449138977053770882'; SET @p2='s'; SET @p3='01100052449138977053770882'; SET @p4='a'; SET @p5=''; SET @p6='k'; SET @p7='5'; SELECT `wykonaj_przelew`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7) AS `wykonaj_przelew`;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $date, $nr_rachunku, $nadawca, $na_rachunek, $odbiorca, $adres_odbiorcy, $tytul, $kwota);
    $stmt->execute();
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
            return $amount['wykonaj_przelew'];
        }
    }
}
function make_future_transfer($nr_rachunku, $nadawca, $na_rachunek, $odbiorca, $adres_odbiorcy, $tytul, $kwota){
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $sql = "SELECT `wykonaj_przelew`(?,?,?,?,?,?,?,?) AS `wykonaj_przelew`";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", date("Y-m-d H-i-s"), $nr_rachunku, $nadawca, $na_rachunek, $odbiorca, $adres_odbiorcy, $tytul, $kwota);
    $stmt->execute();
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
            return $amount['wykonaj_przelew'];
        }
    }

}
function bank_name($nr){
$nr=substr($nr,3,4);
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $sql = sprintf("SELECT * FROM `banki` where zakres_od<=$nr AND zakres_do>=$nr", mysqli_real_escape_string($conn, $nr));
    if ($result = $conn->query($sql)) {
        $conn->close();
        $count = $result->num_rows;
        if ($count == 1) {
            $amount = $result->fetch_assoc();
            return $amount['nazwa_banku'];
        }
    }
}

function products_show($type)
{
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr11');
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=$id and produkty.id_produktu=$type";
    $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {
        $saldo = saldo($row['id_produktu']);
        $dostepne_srodki = dostepne_srodki($row['id_produktu']);
        echo <<<ROW
      <tr>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[data_od]</td>
        <td>$row[nazwa_produktu]</td>
        <td>$saldo</td>
        <td>$dostepne_srodki</td>   
      </tr>
      </br>
ROW;
    }
}
?>