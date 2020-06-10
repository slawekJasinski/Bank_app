<?php
    require('functions.php');
    session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/transfer_form.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/scroll-up.js"></script>
	
        <title>KAS Bank - bankowość elektroniczna</title>
    </head>
    
    <body>
        <div class="wrapper">
            <a href="#" class="scrollup"></a>

            <div class="sidebar">
                <div class="sidebar-top">
                    <a href="#"><h2 style="">Pulpit</h2></a>
                    <ul>
                        <li><a href="main_page.php"><i class="fas fa-home"></i>Strona główna</a></li>
                        <li><a href="pprodukty2.php"><i class="fas fa-briefcase"></i>Twoje produkty</a></li>
                        <li><a href="karty.php"><i class="fas fa-credit-card"></i>Karty płatnicze</a></li>
                        <li><a href="twoje_sprawy.php"><i class="fas fa-file-alt"></i>Twoje wnioski</a></li>
                        <li><a href="transfer_form.php"><i class="fas fa-exchange-alt"></i>Przelewy</a></li>
                        <li><a href="#"><i class="fas fa-history"></i>Historia rachunku</a></li>
                        <li><a href="#"><i class="fas fa-exclamation-circle"></i>Limity</a></li>
                        <li><a href="#"><i class="fas fa-ban"></i>Blokady kart</a></li>
                        <li><a href="#"><i class="fas fa-shopping-basket"></i>Koszyk przelewów</a></li>
                        <li><a href="#"><i class="fas fa-address-book"></i>Odbiorcy i płatnicy</a></li>
                        <li><a href="transactions_history.php"><i class="fas fa-history"></i>Historia przelewów</a></li>
                    </ul> 
                </div>
                
                <div class="sidebar-bottom">
                    <div class="sidebar-top">
                        <ul>
                            <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li> 
                            <li><a href="Logout.php" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li> <!--zrobić forma!!!(lub nie)-->
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

                <div class="info">
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
                </div>
            </div>
        </div>
    </body>

    <script src="js/1.js" type="text/javascript"></script>
</html>