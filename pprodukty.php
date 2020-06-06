<?php
{
    session_start();
    $_SESSION['account_number']='12345678901234567890123456';
    require_once('connect.php');
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
      <tr>
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[data_od]</td>
        <td>$row[nazwa_produktu]</td>
      </tr>
      </br>
ROW;
        }
    }
}
?>
<form action="logout.php" method="post">
    <button type="submit">logout</button>
</form>
<form action="karty.php" method="post">
    <button type="submit">PRzejdzź do kart</button>
</form>
<form action="transfer_form.php" method="post">
    <button type="submit">Może byś tak zrobił przelew?</button>
</form>
<form action="transactions.php" method="post">
    <button type="submit">Twoje transakcje</button>
</form>


