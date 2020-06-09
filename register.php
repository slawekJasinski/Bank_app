<?php
include('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/scroll-up.js"></script>
    <title>rejestracja</title>
</head>

<body>
<div class="wrapper">
    <a href="#" class="scrollup"></a>

    <div class="sidebar">
        <div class="sidebar-top">
            <a href="#"><h2>Pulpit</h2></a>

            <ul>
                <li><a href="admin_panel.php"><i class="fas fa-home"></i>Strona główna</a></li>
                <li><a href="#"><i class="fas fa-user-cog"></i>Zarządzanie klientami</a></li>
                <li><a href="../register.php"><i class="fas fa-user-plus"></i>Dodaj klienta</a></li>
                <li><a href="#"><i class="fas fa-user-minus"></i>Usuń klienta</a></li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-top">
                <ul>
                    <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li>
                    <li><a href="../admin_logout.php" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main_content">
        <div class="header">

            <div class="logo-header">
                <img src="img/logo.png" alt="logo KAS Bank" >
                <div style="clear: both;"></div>
            </div>

            <div class="sign-out">
                <form action="Logout.php" method="get">  <!-- form czy a href ? -->
                    <button class="btn">Wyloguj<i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
        </div>

        <form action="register_execute.php" method="post" class="register-form">

            <span style="color: red">Pierwsze imie</span>  <br>
            <input type="text" name="login" id="login" pattern="^[A-ZŁŚŻ]{1}[a-zóąśłżźćń]{2,20}$" required>
            <br/>
            Drugie imie  //mozliwy NULL<br>
            <input type="text" name="login" id="login" pattern="^[A-ZŁŚŻ]{1}[a-zóąśłżźćń]{1,20}$">
            <br/>
            Nazwisko<br>
            <input type="text" name="login" id="login" pattern="^[A-ZÓŚŁŻŹĆ]{1}[a-zóąśłżźćń]{1,30}$" required>
            <br/>
            PESEL //11 znaków<br>
            <input type="text" name="login" id="login" pattern="[0-9]{11}" required>
            <br/>
            Typ dokumentu tożsamości<br>
            <input type="text" name="login" id="login" required>
            <br>
            Typ adresu <br>

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
            <input type="text" name="login" id="login" required> <!-- dotyczy tego wyżej (typ adresu) ale chyba niepotrzebny ten input  -->
            <br>
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
            <br/>
            Miasto<br>
            <input type="text" name="login" id="login" required>
            <br/>
            Ulica<br>
            <input type="text" name="login" id="login" required>
            <br/>
            Numer domu<br>
            <input type="text" name="login" id="login" pattern="[0-9A-Za-z]" required>
            <br/>
            Numer mieszkania<br>
            <input type="text" name="login" id="login" pattern="[0-9A-Za-z]">
            <br/>
            Kod pocztowy<br>
            <input type="text" name="password" id="password" pattern="[0-9]{2}-[0-9]{3}">
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
            Zgoda na przetwarzanie danych osobowych<input type="checkbox" value="Zg1" name="zgody[]"> <br/><br>
            Zgoda na kontakt drogą elektroniczną w celu marketingowym<input type="checkbox" value="Zg2" name="zgody[]"> <br/><br>
            Zgoda na kontakt telefoniczny w celu marketingowym<input type="checkbox" value="Zg3" name="zgody[]"> <br/><br>
            Zgoda na powiadomienie sms o otrzymaniu wiadomości związanych ze zmianami w regulacjach bankowych<input type="checkbox" value="Zg4" name="zgody[]"> <br/><br>
            Zgoda na otrzymywanie korespondencji w formie elektronicznej na adres email<input type="checkbox" value="Zg5" name="zgody[]"> <br/><br>
            <button type="submit">Zapisz formularz</button>
        </form>
    </div>
</div>
</body>
</html>