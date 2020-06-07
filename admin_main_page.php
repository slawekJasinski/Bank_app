<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KASBank - administracja</title>
</head>
<body>
<h1 style="color: red;">Status sprawy:</h1><?php
{
    session_start();
    require_once('connect.php');
    if (isset($_SESSION['username'])) {
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM `statusy_sprawy`";
    $result = mysqli_query($conn,$sql);
    echo "<select name=\"number\">";
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<option value='" . $row['id_statusu_sprawy'] . "'>" . $row['nazwa_statusu_sprawy'] . " </option>";
        }
        echo "</select>";
    ?>
    </select><br><br>  <!-- tu jest jakieś zamknięcie selecta z html ale nie ma otwarcia, pomyłka? -->
    <?php
    if(isset($_POST['number'])) {
        $account = $_POST['number'];
        $_SESSION['number'] = $account;
    }
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `sprawy` where id_statusu_sprawy IN (1,2)";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
      <tr>
        <td>$row[temat_sprawy]</td>
        <td>$row[tresc_sprawy]</td>
        <td>$row[zalacznik]</td>
        <td>$row[data_zgloszenia]</td>
      </tr>
      </br>
ROW;
        }
    }
}
?>
<form action="register.php" method="post">
    <button type="submit">Dodawanie nowego użytkownika - formularz</button>
</form>
</body>
</html>

