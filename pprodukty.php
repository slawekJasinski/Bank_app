<?php
/*{ POCZĄTEK KOMENTARZA
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
}   KONIEC KOMENTARZA*/ 
?>

<!-- POCZĄREK KOMENTARZA <form action="logout.php" method="post">
    <button type="submit">logout</button>
</form>
<form action="karty.php" method="post">
    <button type="submit">PRzejdzź do kart</button>
</form>
<form action="transfer_form.php" method="post">
    <button type="submit">Może byś tak zrobił przelew?</button>
</form> KONIEC KOMENTARZA-->

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="sgb.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/scroll-up.js"></script>
	
        <title>KAS Bank - bankowość elektroniczna</title>
    </head>
    
    <body style="background-color: black;">
        <div class="wrapper">
            <a href="#" class="scrollup"></a>

            <div class="sidebar">
                <div class="sidebar-top">
                    <a href="pprodukty.php"><h2>Pulpit</h2></a>
                    <ul>
                        <li><a href="pprodukty.php"><i class="fas fa-home"></i>Strona główna</a></li>
                        <li><a href="#"><i class="fas fa-briefcase"></i>Twoje produkty</a></li>
                        <li><a href="#"><i class="fas fa-credit-card"></i>Karty</a></li>
                        <li><a href="#"><i class="fas fa-file-alt"></i>Twoje wnioski</a></li>
                        <li><a href="#"><i class="fas fa-exchange-alt"></i>Przelewy</a></li>
                        <li><a href="#"><i class="fas fa-history"></i>Historia rachunku</a></li>
                        <li><a href="#"><i class="fas fa-exclamation-circle"></i>Limity</a></li>
                        <li><a href="#"><i class="fas fa-ban"></i>Blokady kart</a></li>
                        <li><a href="#"><i class="fas fa-shopping-basket"></i>Koszyk przelewów</a></li>
                        <li><a href="#"><i class="fas fa-address-book"></i>Odbiorcy i płatnicy</a></li>
                        <li><a href="#"><i class="fas fa-history"></i>Historia przelewów</a></li>
                    </ul> 
                </div>
                
                <div class="sidebar-bottom">
                    <div class="sidebar-top">
                        <ul>
                            <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li>
                            <li><a href="logout.php" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main_content">
                <div class="header">

                    <div class="logo-header">
                        <img src="logo.png" alt="logo KAS Bank" >
                        <div style="clear: both;"></div>
                    </div>

                    <div class="sign-out">
                        <a href="logout.php">Wyloguj<i class="fas fa-sign-out-alt"></i></a>
                    </div>
                    
                </div>  

                <div class="info">
                    <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
                </div>
            </div>
        </div>
    </body>
</html>
