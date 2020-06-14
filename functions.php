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
    $sql = "SELECT `wykonaj_przelew`('$date', '$nr_rachunku', '$nadawca', '$na_rachunek', '$odbiorca', '$adres_odbiorcy', '$tytul', '$kwota') AS `wykonaj_przelew`;";
    $stmt = $conn->prepare($sql);
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
        <td class="column1">$row[numer_rachunku]</td>
        <td class="column2">$row[data_aktywacji]</td>
        <td class="column3">$row[data_od]</td>
        <td class="column4">$row[nazwa_produktu]</td>
        <td class="column5">$saldo</td>
        <td class="column6">$dostepne_srodki</td>   
      </tr>
      
ROW;
    }
}
function translate($nr){
    if($nr==0) return "NIE";
    else return "TAK";
}
?>