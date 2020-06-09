<?php
{
    session_start();
    require_once('connect.php');
    require_once('functions.php');
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `przelewy`";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
      <tr>
        <td>$row[na_rachunek]</td>
        <td>$row[odbiorca]</td>
        <td>$row[tytul]</td>
        <td>$row[kwota]</td>
        <td>$row[data_wstawienia]</td> 
      </tr>
      </br>
ROW;
        }
    }
}
