<?php
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

        <link rel="stylesheet" href="css/transfer_confirm.css" type="text/css">
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
                    <a href="main_page.php"><h2>Pulpit</h2></a>
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
                    <?php
                        require_once('functions.php');
                        $sender = $_SESSION['username'];
                        if(isset($_POST['number'])){
                            $account = $_POST['number'];
                            }else{
                            $_SESSION['error-trigger'] = 1;
                            $_SESSION['error'] = "Błędne dane. Spróbuj później!";
                        }
                            if(isset($_POST['credit-card'])){
                                $credit_card = $_POST['credit-card'];
                            }
                            if(isset($_POST['amount'])){
                                $amount = $_POST['amount'];
                            }
                            if(isset($_POST['receiver_name'])){
                                $receiver_name = $_POST['receiver_name'];
                            }
                            if(isset($_POST['receiver_address'])){
                            $_receiver_address = $_POST['receiver_address'];
                            }
                            if(isset($_POST['date'])){
                                $date = $_POST['date'];
                            }
                            if(isset($_POST['title'])){
                                $title = $_POST['title'];
                            }
                    ?>
                    <div class="form_title">
                        Podsumowanie przelewu
                    </div>
                    <?php make_transfer($date, $account, $sender, $credit_card, $receiver_name, $_receiver_address, $title, $amount); ?>
                    <script>alert("<?php echo "Przelew do: ".bank_name(substr($credit_card, 3, 6)); ?>")</script>
                    <div class="form">
                        <div class="outputfield">
                            <label for="name">Konto nadawcy:</label>
                            <p class="output"><?php echo $account ?></p>
                        </div>  
                            <div class="outputfield">
                            <label>Konto odbiorcy:</label>
                            <p class="output"><?php echo $credit_card ?></p>
                        </div> 
                        <div class="outputfield">
                            <label>Bank odbiorcy:</label>
                            <p class="output"><b><?php echo bank_name($credit_card) ?></b></p>
                        </div>  
                        <div class="outputfield">
                            <label>Kwota:</label>
                            <p class="output"><?php echo $amount ?> zł</p>
                        </div> 
                        <div class="outputfield">
                            <a href="main_page.php" class="btn2">Powrót do strony głównej</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>