<?php
    session_start();
    require_once('connect.php');
    if (isset($_SESSION['username'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'wikomp_gr1'); //połaczenie z baza
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` join `karty` using (id_produktu_klienta) WHERE id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            echo <<<ROW
      <tr>
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[id_karty]</td>
        <td>$row[numer_karty]</td>
        <td>$row[data_waznosci]</td>
        <td>$row[CVV]</td>
        <td>$row[zablokowana]</td>
      </tr>
      </br>
ROW;
        }
    }
?>
<form action="logout.php" method="post">
    <button type="submit">logout</button>
</form>

