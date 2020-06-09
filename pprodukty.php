<?php
{
    session_start();
    $_SESSION['account_number']='12345678901234567890123456';
    require_once('connect.php');
    require_once('functions.php');
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            $saldo=saldo($row['id_produktu']);
            $dostepne_srodki=dostepne_srodki($row['id_produktu']);
            echo <<<ROW
      <tr>
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
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
}
?>