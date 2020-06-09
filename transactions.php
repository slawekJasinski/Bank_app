<?php
session_start();
require_once('connect.php');
require_once ('functions.php');
if (isset($_SESSION['username'])) {
    $id=$_SESSION['id'];
    require_once('connect.php');
    $sql = "SELECT * FROM `produkty_klienci` where id_klienta=$id AND id_produktu=1";
    $result = mysqli_query($conn,$sql);
    echo "<select name=\"number\">";
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<option value='" . $row['numer_rachunku'] . "'>" . $row['numer_rachunku']." - dostępne środki:".dostepne_srodki($row['numer_rachunku']) ."zł"." </option>";
        }
        echo "</select>";
    ?>
    </select><br><br>
    <?php
    if(isset($_POST['number'])) {
        $account = $_POST['number'];
        $_SESSION['number'] = $account;
    }
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $sql = "SELECT data_transakcji,numer_rachunku, kwota, tytul, \"PRZYCHODZACE\" as status FROM `transakcje_przychodzace` UNION SELECT data_transakcji,numer_rachunku, kwota, tytul, \"WYCHODZACE\" as status FROM `transakcje_wychodzace` ORDER BY data_transakcji WHERE 'numer_rachunku=$number";
    $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        echo <<<ROW
      <tr>
        <td>$row[data_transakcji]</td>
        <td>$row[numer_rachunku]</td>
        //odbiorca, nadawca
        <td>$row[kwota]</td>
      </tr>
      </br>
ROW;
    }
}
