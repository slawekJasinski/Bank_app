<?php
{ 
    session_start();
    $_SESSION['account_number']='12345678901234567890123456';
    require_once('../connect.php');
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/admin_panel.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/scroll-up.js"></script>
	
        <title>KAS Bank - panel Administratora</title>
    </head>
    
    <body>
        <div class="wrapper">
            <a href="#" class="scrollup"></a>

            <div class="sidebar">
                <div class="sidebar-top">
                    <a href="admin_panel.php"><h2>Pulpit</h2></a>
  
                    <ul>
                        <li><a href="admin_panel.php"><i class="fas fa-home"></i>Strona główna</a></li>
                        <li><a href="#"><i class="fas fa-user-cog"></i>Zarządzanie klientami</a></li>
                        <li><a href="../register3.php"><i class="fas fa-user-plus"></i>Dodaj klienta</a></li>
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
                        <img src="../img/logo.png" alt="logo KAS Bank" >
                        <div style="clear: both;"></div>
                    </div>

                    <div class="sign-out">

                        <form action="../admin_logout.php" method="get">  <!-- form czy a href ? -->
                            <button class="btn">Wyloguj<i class="fas fa-sign-out-alt"></i></button>
                        </form>
                                                
                    </div>
                    
                </div>  

                <div class="info">
                    

                        <div class="square">
                            <p>W tym panelu możesz utworzyć konto dla nowego klienta</p>
                            <p class="icon1"><a href="../register3.php"><i class="fas fa-user-plus" style="color: green"></i></a></p>
                            <div class="test">
                                <a href="../register3.php">
                                    <button class="btn2">Utwórz konto nowego klienta</button>
                                </a>
                            </div>
                        </div>
                        <div class="square">
                            <p>W tym panelu możesz zarządać istniejącymi klientami</p>
                            <p class="icon2"><a href="#"><i class="fas fa-user-cog" style="color: gray"></i></a></p>
                            <div class="test">
                                <a href="#">
                                    <button class="btn2">Przejdź do zarządzania</button>
                                </a>
                            </div>
                        </div>
                        <div class="square">
                            <p>W tym panelu możesz usunąć konto obecnego klienta</p>
                            <p class="icon3"><a href="#"><i class="fas fa-user-minus" style="color: #e00000"></i></a></p>
                            <div class="test">
                                <a href="#">
                                    <button class="btn2">Usuń konto klienta</button>
                                </a>
                            </div>
                        </div>
                        
                        
                        

                    
                </div>
            </div>
        </div>
    </body>
</html>