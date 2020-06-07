<?php
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejestracja nowego użytkownika</title>
</head>
<body>
<form action="register_execute.php" method="post">
    Pierwsze imie <br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Drugie imie  //mozliwy NULL<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Nazwisko<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    PESEL //11 znaków<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Typ dokumentu tożsamości<br>
    <input type="text" name="login" id="login" required/>
    <br>
    Typ adresu <br>
    <input type="text" name="login" id="login" required/>
    <br/>
    <?php
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM `typy_adresu`";
    $result = mysqli_query($conn,$sql);
    echo "<select name=\"number\">";
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<option value='" . $row['id_typu_adresu'] . "'>" . $row['nazwa_typu_adresu'] . " </option>";
    }
    echo "</select>";
    ?>
    </select><br><br>
    <?php
    if(isset($_POST['number'])){
        $account =  $_POST['number'];
        $_SESSION['number'] = $account;
    }
    ?>
    Numer dokumentu tożsamości<br>
    <input type="text" name="login" id="login" required>
    <br/>
    ID wstawiającego //lista<br>
    <input type="text" name="login" id="login" required>
    <br/>
    Miasto<br>
    <input type="text" name="login" id="login" required>
    <br/>
    Ulica<br>
    <input type="text" name="login" id="login" required>
    <br/>
    Numer domu<br>
    <input type="text" name="login" id="login" required>
    <br/>
    Numer mieszkania<br>
    <input type="text" name="login" id="login" required>
    <br/>
    Kod pocztowy<br>
    <input type="text" name="password" id="password" required>
    <br/>
    Kraj<br>
    <input type="text" name="password" id="password" required>
    <br/>
    Adres email<br>
    <input type="email" name="login" id="login" required>
    <br/>
    Hasło<br>
    <input type="password" name="password" id="password" required>
    <br/>
    Zgoda1 <br>
    Zgoda2<br>
    Zgoda3<br>
    Zgoda4<br>
    Zgoda5<br>

    <button type="submit">Zapisz formularz</button>
</form>
</body>
</html>
