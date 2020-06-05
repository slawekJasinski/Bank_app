<?php
{ 
    session_start();
    $_SESSION['account_number']='12345678901234567890123456';
    require_once('connect.php');
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
      <tr>
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[data_od]</td>
        <td>$row[nazwa_produktu]</td>
      </tr>
      </br>
ROW;
        }
    }
}  
?>

 <!--<form action="logout.php" method="post">
    <button type="submit">logout</button>
</form>
<form action="karty.php" method="post">
    <button type="submit">Przejdź do kart</button>
</form>
<form action="Przelew.php" method="post">
    <button type="submit">Może byś tak zrobił przelew?</button>
</form> -->

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="admin_panel.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/scroll-up.js"></script>
	
        <title>KAS Bank - panel Administratora</title>
    </head>
    
    <body>
        <div class="wrapper">
            <a href="#" class="scrollup"></a>

            <div class="sidebar">
                <div class="sidebar-top">
                    <a href="#"><h2 style="">Pulpit</h2></a>
  
                    <ul>
                        <li><a href="pprodukty.php"><i class="fas fa-home"></i>Strona główna</a></li>
                        <li><a href="#"><i class="fas fa-briefcase"></i>Dodaj klienta [test]</a></li>
                        <li><a href="karty.php"><i class="fas fa-credit-card"></i>Usuń klienta [test]</a></li>
                        <li><a href="twoje_sprawy.php"><i class="fas fa-file-alt"></i>Zarządzanie klientami</a></li>
                    </ul> 
                </div>
                
                <div class="sidebar-bottom">
                    <div class="sidebar-top">
                        <ul>
                            <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li> 
                            <li style="border-bottom: 1px solid green;"><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li> <!--zrobić forma!!!-->
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

                        <form action="logout.php" method="get">
                            <button class="btn">Wyloguj<i class="fas fa-sign-out-alt"></i></button>
                        </form>
                                                
                    </div>
                    
                </div>  

                <div class="info">

                    <div class="square">
                        <p>Wnioski</p>
                        <div class="test">
                            <form action="twoje_sprawy.php" method="get">
                                <button class="btn2">Zobacz swoje wnioski</button>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </body>
</html>
