<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }
    require_once('connect.php');
    require_once('functions.php');
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/pprodukty.css" type="text/css">
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

                <div class="info">
                    <div class="table">
                        <h1>Konta osobiste</h1>
                        <table>
                            <tr>
                                <th>numer rachunku</th>
                                <th>data aktywacji</th>
                                <th>nazwa produktu</th>
                                <th>saldo</th>
                                <th>dostępne środki</th>
                            </tr>
                            <!--</table>-->
                            <?php
                                {
                                    if (isset($_SESSION['username'])) {
                                        products_show(1); // to są produkty po id, 1-konto 2-karta kredytowa 3-kredyt 4-lokata
                                        //products_show(2);
                                        //products_show(3);
                                        //products_show(4);
                                    }else(header('location:index.php'));
                                }
                            ?>
                        </table>
                    </div>
                    <div class="table">
                        <h1>Karty kredytowe</h1>
                        <table>
                            <tr>
                                <th>numer rachunku</th>
                                <th>data aktywacji</th>
                                <th>nazwa produktu</th>
                                <th>saldo</th>
                                <th>dostępne środki</th>
                            </tr>
                            <!--</table>-->
                            <?php
                                {
                                    if (isset($_SESSION['username'])) {
                                        //products_show(1); // to są produkty po id, 1-konto 2-karta kredytowa 3-kredyt 4-lokata
                                        products_show(2);
                                        //products_show(3);
                                        //products_show(4);
                                    }else(header('location:index.php'));
                                }
                            ?>
                        </table>
                    </div>
                    <div class="table">
                        <h1>Kredyty</h1>
                        <table>
                            <tr>
                                <th>numer rachunku</th>
                                <th>data aktywacji</th>
                                <th>nazwa produktu</th>
                                <th>saldo</th>
                                <th>dostępne środki</th>
                            </tr>
                            <!--</table>-->
                            <?php
                                {
                                    if (isset($_SESSION['username'])) {
                                        //products_show(1); // to są produkty po id, 1-konto 2-karta kredytowa 3-kredyt 4-lokata
                                        //products_show(2);
                                        products_show(3);
                                        //products_show(4);
                                    }else(header('location:index.php'));
                                }
                            ?>
                        </table>
                    </div>
                    <div class="table">
                        <h1>Lokaty</h1>
                        <table>
                            <tr>
                                <th>numer rachunku</th>
                                <th>data aktywacji</th>
                                <th>nazwa produktu</th>
                                <th>saldo</th>
                                <th>dostępne środki</th>
                            </tr>
                            <!--</table>-->
                            <?php
                                {
                                    if (isset($_SESSION['username'])) {
                                        //products_show(1); // to są produkty po id, 1-konto 2-karta kredytowa 3-kredyt 4-lokata
                                        //products_show(2);
                                        //products_show(3);
                                        products_show(4);
                                    }else(header('location:index.php'));
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
