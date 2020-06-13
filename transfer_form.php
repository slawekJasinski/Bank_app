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
                <div class="wrapper2">
                    <div class="form_title">
                        Wykonaj przelew
                    </div>
                    <div class="form">
                        <form action="transfer_confirm.php" method="post">
                        <?php
                            $id=$_SESSION['id'];
                            require_once('connect.php');
                            $sql = "SELECT * FROM `produkty_klienci` where id_klienta=$id AND id_produktu IN (select id_typu_produktu from typy_produktow where czy_produkt_z_karta=1)";
                            $result = mysqli_query($conn,$sql);
                            echo "<select name=\"number\">";
                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                echo "<option value='" . $row['numer_rachunku'] . "'>" . $row['numer_rachunku']." - dostępne środki: ".dostepne_srodki($row['id_produktu_klienta']) ."zł"." </option>";
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
                            <div class="inputfield">
                                <label for="name">Numer konta odbiorcy</label>
                                <input type="text" class="input" name="credit-card" id="credit-card" autocomplete="off" required>
                            </div>  
                                <div class="inputfield">
                                <label>Kwota</label>
                                <input type="number" class="input" name="amount" min="0.00" id="amount" step="0.01" required>
                            </div> 
                            <div class="inputfield">
                                <label>Nazwa odbiorcy</label>
                                <input type="text" class="input" name="receiver_name" id="receiver_name" required>
                            </div>  
                            <div class="inputfield">
                                <label>Tytuł przelewu</label>
                                <input type="text" class="input" name="title" id="title" min="0.00" step="0.01" required>
                            </div>  
                            <div class="inputfield">
                                <label>Data wykonania przelewu</label>
                                <input type="date" class="input" name="date" id="date" min="<?php $date = date('m/d/Y h:i:s a', time())?>" max="2020-12-31">
                            </div>  
                            <div class="inputfield">
                                <label>Podaj kod autoryzacyjny</label>
                                <input type="text" class="input" name="cvv" id="cvv" minlength="4" maxlength="4" required>
                            </div>  
                            <div class="inputfield">
                                <label>Twój kod autoryzacyjny to:</label>
                                <?php
                                    $_SESSION['cvv'] = rand(1000, 9999);
                                    echo $_SESSION['cvv'];
                                ?>
                            </div>  
                                <div class="inputfield">
                            </div> 
                            <div class="inputfield">
                                <button type="submit" name="sumbit" value="Wykonaj" class="submit-btn">Wykonaj</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>