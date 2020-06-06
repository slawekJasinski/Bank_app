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
<form action="settings_update.php" method="post">
    Miasto<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Ulica<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Numer domu<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Numer mieszkania<br>
    <input type="text" name="login" id="login" required/>
    <br/>
    Kod pocztowy<br>
    <input type="password" name="password" id="password" required/>
    <br/>
    Kraj<br>
    <input type="" name="password" id="password" required/>
    <br/>
    Hasło<br>
    <input type="password" name="login" id="login" required/>
    <br/>
    //nr telefonu, adres mail, dane kontaktowe
    Zgoda1<br>
    Zgoda2<br>
    Zgoda3<br>
    Zgoda4<br>
    Zgoda5<br>
    <button type="submit">Zapisz zmiany</button>
</form>
</body>
</html>