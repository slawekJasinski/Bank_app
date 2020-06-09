<?php
    require('functions.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przelew</title>
    </head>

    <body>
        <form action="transfer_confirm.php" method="post">

            <?php
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

            <?php
                if(isset($_POST['number'])){
                    $account =  $_POST['number'];
                    $_SESSION['number'] = $account;
                }
                $sender=$_SESSION['username'];
            ?>

            <div>
                <label for="credit-card">Numer konta odbiorcy</label>
                <input id="credit-card" name="credit-card" type="text" autocomplete="off">
            </div>
            Kwota
            <input type="number" name="amount" min="0.00" step="0.01" id="amount" required>
            <br/>
            Nazwa odbiorcy
            <input type="text" name="receiver_name" id="amount" required>
            <br/>
            Tytuł przelewu
            <input type="text" name="title" min="0.00" step="0.01" id="amount" required>
            <br/>
            Data wykonania przelewu
            <input id="datefield" type='date' name='date' min='2020-06-01' max='2020-12-31'></input>
            
            <script src="js/date.js" type="text/javascript"></script>

            <br/>
            <button type="submit" name="submit" value="submit">Przejdź do podsumowania</button>
        </form>
    </body>
        
    <script src="js/1.js" type="text/javascript"></script>

</html>