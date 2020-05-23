<?php
{
    session_start();
    if (isset($_SESSION['username'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'wikomp_gr1'); //połaczenie z baza
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=1";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        $verify = mysqli_fetch_array($result);
        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
      <tr>
        <td>$row[numer_rachunku]</td>
        <td>$row[nazwa_produktu]</td>
      </tr>
      </br>
<br/>
ROW;
        }
    }
}
?>
<form action="logout.php" method="post">
    <button type="submit">logout</button>
</form>

