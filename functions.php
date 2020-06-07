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
function is_cvv_correct($cvv_from_user, $cvv_from_system ){
    if($cvv_from_system==$cvv_from_user){
        return true;
    }else{
        return false;
    }
}
function saldo($nr){
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr1');
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
    $conn = mysqli_connect('localhost', 'wikomp_gr1','BDWsB2021','wikomp_gr1');
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
function make_transfer(){

}
function make_future_transfer(){

}
?>