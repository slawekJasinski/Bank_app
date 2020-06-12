<?php
include('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="register3.css" type="text/css">
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
                    <a href="admin/admin_panel.php"><h2>Pulpit</h2></a>

                    <ul>
                        <li><a href="admin/admin_panel.php"><i class="fas fa-home"></i>Strona główna</a></li>
                        <li><a href="#"><i class="fas fa-user-cog"></i>Zarządzanie klientami</a></li>
                        <li><a href="register3.php"><i class="fas fa-user-plus"></i>Dodaj klienta</a></li>
                        <li><a href="#"><i class="fas fa-user-minus"></i>Usuń klienta</a></li>
                    </ul>
                </div>

                <div class="sidebar-bottom">
                    <div class="sidebar-top">
                        <ul>
                            <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li>
                            <li><a href="admin_logout.php" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li>
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
                        <form action="admin_logout.php" method="get">  <!-- form czy a href ? -->
                            <button class="btn">Wyloguj<i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </div>
                </div>

                <div class="wrapper2">
                    <div class="title">
                        Rejestracja klienta
                    </div>
                    <div class="form">
                        <form action="register_execute.php" method="post">
                            <div class="inputfield">
                                <label for="name">Pierwsze imię</label>
                                <input type="text" class="input" name="name" id="name" pattern="^[A-ZŁŚŻ]{1}[a-zóąśłżźćń]{2,20}$" required>
                            </div>  
                                <div class="inputfield">
                                <label>Drugie imię</label>
                                <input type="text" class="input" name="second_name" id="second_name" pattern="^[A-ZŁŚŻ]{1}[a-zóąśłżźćń]{1,20}$">
                            </div> 
                            <div class="inputfield">
                                <label>Nazwisko</label>
                                <input type="text" class="input" name="surname" id="surname" pattern="^[A-ZÓŚŁŻŹĆ]{1}[a-zóąśłżźćń]{1,30}$" required>
                            </div>  
                            <div class="inputfield">
                                <label>PESEL</label>
                                <input type="text" class="input" name="pesel" id="pesel" pattern="[0-9]{11}" required>
                            </div>  
                            <div class="inputfield">
                                <label>Typ dokumentu tożsamości</label>
                                <?php
                                    $id=$_SESSION['id'];
                                    $sql = "SELECT * FROM `dok_tozsamosci`";
                                    $result = mysqli_query($conn,$sql);
                                    echo "<select name=\"id_type\">";
                                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                        echo "<option value='" . $row['id_dok_tozsamosci'] . "'>" . $row['nazwa_dok_tozsamosci'] . " </option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>  
                            <div class="inputfield">
                                <label>Numer dokumentu tożsamości</label>
                                <input type="text" class="input" name="id_number" id="id_number" required>
                            </div>  
                            <div class="inputfield">
                                <label>Adres e-mail</label>
                                <input type="email" class="input" name="email" id="email" required>
                            </div>  
                            <div class="inputfield">
                                <label>Potwierdź adres e-mail</label>
                                <input type="email" class="input" name="email2" id="email2" required>
                            </div>  
                            <div class="inputfield">
                                <label>Hasło</label>
                                <input type="password" class="input" name="password" id="password" required>
                            </div>  
                            <div class="inputfield">
                                <label>Potwierdź hasło</label>
                                <input type="password" class="input" name="password2" id="password2" required>
                            </div> 
                                <div class="inputfield">
                                <label>Typ adresu</label>
                                <?php
                                    $id=$_SESSION['id'];
                                    $sql = "SELECT * FROM `typy_adresu`";
                                    $result = mysqli_query($conn,$sql);
                                    echo "<select class=\"custom_select\" name=\"number\">";
                                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                        echo "<option value='" . $row['id_typu_adresu'] . "'>" . $row['nazwa_typu_adresu'] . " </option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div> 
                            <div class="inputfield">
                                <label>Miasto</label>
                                <input type="text" class="input" name="city" id="city" required>
                            </div> 
                            <div class="inputfield">
                                <label>Ulica</label>
                                <input type="text" class="input" name="street" id="street" required>
                            </div> 
                            <div class="inputfield">
                                <label>Numer domu</label>
                                <input type="text" class="input" name="house" id="house" pattern="[0-9]" required>
                            </div> 
                            <div class="inputfield">
                                <label>Numer mieszkania</label>
                                <input type="text" class="input" name="apartment" id="apartment" pattern="[0-9]">
                            </div> 
                            <div class="inputfield">
                                <label>Kod pocztowy</label>
                                <input type="text" class="input" name="code" id="code" pattern="[0-9]{2}-[0-9]{3}" required>
                            </div> 
                            <div class="inputfield">
                                <label>Kraj</label>
                                <input type="text" class="input" name="country" id="country" required>
                            </div> 
                            <div class="inputfield terms" style="margin-top: 40px">
                                <label class="check">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Zgoda na przetwarzanie danych osobowych</p>
                            </div> 
                            <div class="inputfield terms">
                                <label class="check">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Zgoda na kontakt drogą elektroniczną w celu marketingowym</p>
                            </div> 
                            <div class="inputfield terms">
                                <label class="check">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Zgoda na kontakt telefoniczny w celu marketingowym</p>
                            </div> 
                            <div class="inputfield terms">
                                <label class="check">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Zgoda na powiadomienie sms o otrzymaniu wiadomości związanych ze zmianami w regulacjach bankowych</p>
                            </div> 
                            <div class="inputfield terms" style="margin-bottom: 40px">
                                <label class="check">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Zgoda na otrzymywanie korespondencji w formie elektronicznej na adres email</p>
                            </div> 
                            <div class="inputfield">
                                <input type="submit" value="Register" class="submit-btn">
                            </div>
                        </form>
                    </div>
                </div>	
            </div>
        </div>
    </body>
</html>