<?php
{
    session_start();
    require_once('connect.php');
    require_once('functions.php');
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` left join `produkty` on produkty_klienci.id_produktu=produkty.id_produktu where id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            $saldo=saldo($row['id_produktu']);
            $dostepne_srodki=dostepne_srodki($row['id_produktu']);
            echo <<<ROW
      <tr style="color: red;">
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[data_od]</td>
        <td>$row[nazwa_produktu]</td>
        <td>$saldo</td>
        <td>$dostepne_srodki</td>   
      </tr>
      </br>
ROW;
        }
    }else(header('location:index.php'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="sgb.css" type="text/css">
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
                <li><a href="pprodukty.php"><i class="fas fa-home"></i>Strona główna</a></li>
                <li><a href="#"><i class="fas fa-briefcase"></i>Twoje produkty</a></li>
                <li><a href="karty.php"><i class="fas fa-credit-card"></i>Karty płatnicze</a></li>
                <li><a href="twoje_sprawy.php"><i class="fas fa-file-alt"></i>Twoje wnioski</a></li>
                <li><a href="transfer_form.php"><i class="fas fa-exchange-alt"></i>Przelewy</a></li>
                <li><a href="account_summary"><i class="fas fa-history"></i>Historia rachunku</a></li>
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
                    <li><a href="settings.php" style="padding: 0; text-align: center; line-height: 50px;">Ustawienia</a></li>
                    <li><a href="#" style="padding: 0; text-align: center; line-height: 50px;">Wyloguj</a></li> <!--zrobić forma!!!(lub nie)-->
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

                <form action="logout.php" method="get">  <!-- form czy a href ? -->
                    <button class="btn">Wyloguj<i class="fas fa-sign-out-alt"></i></button>
                </form>

            </div>

        </div>

        <div class="info">
            <div class="warn">
                <div class="msg">Wszelkie e-maile, wiadomości i telefony, w których jesteś proszony o <strong style="color: #fff;">dane autoryzacyjne</strong> typu numer identyfikacyjny, kod dostępu lub kod SMS, traktuj jako <b style="color: #fff;">próbę oszustwa</b>!</div>
            </div>

            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
            <div class="square">
                <p>Wnioski</p>
                <div class="test">
                    <a href="twoje_sprawy.php">
                        <button class="btn2">Zobacz swoje wnioski</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
