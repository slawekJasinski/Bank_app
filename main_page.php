<?php
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="main_page.css" type="text/css">
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
                    <div class="warn">
                        <div class="msg">Wszelkie e-maile, wiadomości i telefony, w których jesteś proszony o <strong style="color: #fff;">dane autoryzacyjne</strong> typu numer identyfikacyjny, kod dostępu lub kod SMS, traktuj jako <strong style="color: #fff;">próbę oszustwa</strong>!</div>
                    </div>
                    <!--może rozdzielić warn i square (od info)-->

                    <div class="square">
                        <p>Wnioski</p>
                        <i class="fas fa-file-alt"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Zobacz swoje wnioski</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Twoje produkty</p>
                        <i class="fas fa-briefcase"></i>
                        <div class="test">
                            <a href="pprodukty.php">
                                <button class="btn2">Zobacz produkty</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Karty</p>
                        <i class="fas fa-credit-card"></i>
                        <div class="test">
                            <a href="karty.php">
                                <button class="btn2">Wyświetl karty</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Historia rachunku</p>
                        <i class="fas fa-history"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Historia rachunku</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Przelew</p>
                        <i class="fas fa-exchange-alt"></i>
                        <div class="test">
                            <a href="transfer_form.php">
                                <button class="btn2">Wykonaj przelew</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Historia przelewów</p>
                        <i class="fas fa-history"></i>
                        <div class="test">
                            <a href="transactions_history.php">
                                <button class="btn2">Historia przelewów</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Limity</p>
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Zobacz limity</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Koszyk przelewów</p>
                        <i class="fas fa-shopping-basket"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Wyświetl koszyk</button>
                            </a>
                        </div>
                    </div>
                    <div class="square">
                        <p>Blokady kart</p>
                        <i class="fas fa-ban"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Zobacz blokady</button>
                            </a>
                        </div>
                    </div>                    
                    <div class="square">
                        <p>Odbiorcy i płatnicy</p>
                        <i class="fas fa-address-book"></i>
                        <div class="test">
                            <a href="#">
                                <button class="btn2">Wyświetl listę</button>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </body>
</html>
