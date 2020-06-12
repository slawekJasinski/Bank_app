<?php
require('functions.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
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
        <script type="text/javascript">
            function transfer(){
                $.ajax({url:"transfer_confirm.php", success:function(result) {
                        $("div").text(result);
                    }})
            }
        </script>

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
                        <li><a href="pprodukty.php"><i class="fas fa-briefcase"></i>Twoje produkty</a></li>
                        <li><a href="karty.php"><i class="fas fa-credit-card"></i>Karty płatnicze</a></li>
                        <li><a href="#"><i class="fas fa-file-alt"></i>Twoje wnioski</a></li>
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
                    <form action="transfer_confirm.php" method="post" class="transfer-form">
                        <?php
                            $id=$_SESSION['id'];
                            require_once('connect.php');
                        $sql = "SELECT * FROM `produkty_klienci` where id_klienta=$id AND id_produktu IN (select id_typu_produktu from typy_produktow where czy_produkt_z_karta=1)";
                            $result = mysqli_query($conn,$sql);
                            echo "<select name=\"number\">";
                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                echo "<option value='" . $row['numer_rachunku'] . "'>" . $row['numer_rachunku']." - dostępne środki:".dostepne_srodki($row['id_produktu']) ."zł"." </option>";
                            }
                            echo "</select>";
                            ?>

                            <?php
                            if(isset($_POST['numer_rachunku'])){
                                $account =  $_POST['numer_rachunku'];
                                $_SESSION['numer_rachunku'] = $account;
                            }
                            $sender=$_SESSION['username'];
                        ?>
                        <br/>
                        Numer konta odbiorcy
                        <input type="text" name="credit-card" id="credit-card" autocomplete="off" required>
                        </br>
                        Kwota
                        <input type="number" name="amount" min="0.00" id="amount" step="0.01"required>
                        <br/>
                        Nazwa odbiorcy
                        <input type="text" name="receiver_name" id="receiver_name" required>
                        <br/>
                        Tytuł przelewu
                        <input type="text" name="title" id="title" min="0.00" step="0.01" required>
                        <br/>
                        Data wykonania przelewu
                        <input id="date" type="date" name="date" min="2020-06-01" max="2020-12-31"></input>
                        <br/>
                        Podaj kod autoryzacyjny: <input type="text" name="cvv" id="cvv" minlength="4" maxlength="4" required/>
                        <br/>
                        Twój kod autoryzacyjny to:
                        <?php
                            $_SESSION['cvv'] = rand(1000, 9999);
                            echo $_SESSION['cvv'];
                        ?>
                        <br>
                        <button type="submit" name="submit" onclick=value="submit">Wykonaj przelew</button>
                        <?php
                    /*if (isset($_POST['submit'])) {
                        make_transfer($_POST['date'], $account, '1',$account, $_POST['receiver_name'], '1',$_POST['title'], $_POST['amount']);
                        echo "Przelew został zrealizowany";
                        }
                        */?>
                    </form>
                </div>
            </div>
        </div>
    </body>
