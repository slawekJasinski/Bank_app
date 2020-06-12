<?php
{
    session_start();
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
            
      //echo'<tr>';
        echo'<span>$row[id_produktu_klienta]</span>';
        echo'<td>$row[id_klienta]</td>';
        echo'<td>$row[id_produktu]</td>';
        echo'<td>$row[numer_rachunku]</td>';
        echo'<td>$row[data_aktywacji]</td>';
        echo'<td>$row[data_od]</td>';
        echo'<td>$row[nazwa_produktu]</td>';
        echo'<td>$saldo</td>';
        echo'<td>$dostepne_srodki</td>   ';
        //echo'</tr>';

        }
    }else(header('location:index.php'));
}
?>