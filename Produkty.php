<?php
{
    session_start();
    require_once('connect.php');   //$username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=1";
    $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
    $verify = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<ROW
      <tr>
        <td>$row[nr_rachunku]</td>
        <td>$row[nazwa_produktu]</td>
      </tr>
ROW;
    }
}
header('location: index.php');
?>
