<?php
require_once('connect.php');
require_once('functions.php');
session_start();
$id=$_SESSION['id'];
$sql = "SELECT * FROM `produkty_klienci` where id_klienta=$id";
$result = mysqli_query($conn,$sql);
/*echo "<select name=\"number\" id='\"number\"'>";
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    echo "<option value='" . $row['numer_rachunku'] . "'>" . $row['numer_rachunku']." - dostępne środki:".dostepne_srodki($row['numer_rachunku']) ."zł"." </option>";
}
echo "</select>";

    <script>
        const select = document.querySelector('#number')
        select.addEventListener('change', (e) => {
            $account = number.value;
        }
    </script>
<br>
*/

if (mysqli_num_rows($result)!=0) {
    echo '<select name="drop_2" id="drop_2">
      <option value=" " selected="account">Choose one</option>';
    while ($drop_2 = mysqli_fetch_array($result)) {
        echo '<option value="' . $drop_2['numer_rachunku'] . '">' . $drop_2['numer_rachunku'] . '</option>';
    }
    echo '</select>';
    if (isset($_POST['number'])) {
        $account = $_POST['number'];
        $_SESSION['number'] = $account;
    }
    $sql = "SELECT data_transakcji, z_rachunku as numer, odbiorca, tytul, kwota, 'przychodzace', '1' as wykonane FROM `transakcje_przychodzace` where numer_rachunku=$account UNION SELECT data_transakcji, na_rachunek as numer, odbiorca, tytul, kwota, 'wychodzace', czy_wykonana as wykonane FROM `transakcje_wychodzace` WHERE numer_rachunku=$account";
    $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<ROW
      <tr>
        <td>$row[data_transakcji]</td>
        <td>$row[numer]</td>
        <td>$row[odbiorca]</td> 
        <td>$row[tytul]</td>
        <td>$row[kwota]</td>
      </tr>
      </br>
ROW;

    }
}
?>