<?php
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja nowego użytkownika</title>
</head>
<body>
<form action="settings_update.php" method="post">
    Ulica<br>
    <input type="text" name="login" id="login">
    <br>
    Numer domu<br>
    <input type="text" name="house" id="house">
    <br>
    Numer mieszkania<br>
    <input type="text" name="apartment" id="apartment">
    <br>
    Miasto<br>
    <input type="text" name="city" id="city">
    <br>
    Kod pocztowy<br>
    <input type="text" name="login" id="login">
    <br>
    Kraj<br>
    <input type="text" name="country" id="country" />
    <br>
    Hasło<br>
    <input type="password" name="login" id="login" />
    <br>
    Zgoda na przetwarzanie danych osobowych<input type="checkbox" value="Zg1" name="zgody[]"> <br/><br>
    Zgoda na kontakt drogą elektroniczną w celu marketingowym<input type="checkbox" value="Zg2" name="zgody[]"> <br/><br>
    Zgoda na kontakt telefoniczny w celu marketingowym<input type="checkbox" value="Zg3" name="zgody[]"> <br/><br>
    Zgoda na powiadomienie sms o otrzymaniu wiadomości związanych ze zmianami w regulacjach bankowych<input type="checkbox" value="Zg4" name="zgody[]"> <br/><br>
    Zgoda na otrzymywanie korespondencji w formie elektronicznej na adres email<input type="checkbox" value="Zg5" name="zgody[]"> <br/><br>
    <button type="submit">Zapisz zmiany</button>
</form>
</body>
</html>