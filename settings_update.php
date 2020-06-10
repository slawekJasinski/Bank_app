<?php
  session_start();
  require_once('connect.php');
  require_once('functions.php');
  $id=$_SESSION['id'];
  $sql = "SELECT * FROM adresy as ad join adresy_klienci as a on ad.id_adresu=a.id_adresu join klienci as k on a.id_klienta=k.id_klienta where a.id_klienta=$id";
  $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
  while ($row = mysqli_fetch_array($result)) {
      echo <<<ROW
        <tr>
          <td>$row[id_typu_adresu]</td>
          <td>$row[id_adresu]</td>
          <td>$row[miasto]</td>
          <td>$row[ulica]</td>
          <td>$row[nr_domu]</td>
          <td>$row[nr_mieszkania]</td>
          <td>$row[kod_pocztowy]</td>
          <td>$row[kraj]</td>
        </tr>
        </br>
  ROW;
  }
?>