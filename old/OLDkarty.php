<?php
    session_start();
    require_once('connect.php');
    if (isset($_SESSION['username'])) {
        $conn = mysqli_connect('localhost', 'wikomp_gr1', 'BDWsB2021', 'wikomp_gr11'); //połaczenie z baza
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `produkty_klienci` join `karty` using (id_produktu_klienta) WHERE id_klienta=$id";
        $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            echo <<<ROW
      <tr>
        <td>$row[id_produktu_klienta]</td>
        <td>$row[id_klienta]</td>
        <td>$row[id_produktu]</td>
        <td>$row[numer_rachunku]</td>
        <td>$row[data_aktywacji]</td>
        <td>$row[id_karty]</td>
        <td>$row[numer_karty]</td>
        <td>$row[data_waznosci]</td>
        <td>$row[CVV]</td>
        <td>$row[czy_zablokowana]</td>
      </tr>
      </br>
ROW;
        }
    }
?>



<?php
    session_start();
    require_once('connect.php');
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
                    <a href="#"><h2>Pulpit</h2></a>
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
                        <table>
                            <tr>
                                <th>numer rachunku</th>
                                <th>data aktywacji</th>
                                <th>numer karty</th>
                                <th>data ważności</th>
                                <th>blokada karty</th>
                            </tr>
                            <!--</table>-->
                            <?php
                                //session_start();
                                //require_once('connect.php');
                                if (isset($_SESSION['username'])) {
                                    $conn = mysqli_connect('localhost', 'wikomp_gr1', 'BDWsB2021', 'wikomp_gr11'); //połaczenie z baza
                                    $username = $_SESSION['username'];
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `produkty_klienci` join `karty` using (id_produktu_klienta) WHERE id_klienta=$id";
                                    $result = mysqli_query($conn, $sql) or die("Błąd polaczenia" . mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo <<<ROW
                                            <tr>
                                                <td>$row[numer_rachunku]</td>
                                                <td>$row[data_aktywacji]</td>
                                                <td>$row[numer_karty]</td>
                                                <td>$row[data_waznosci]</td>
                                                <td>$row[czy_zablokowana]</td>
                                            </tr>
                                        ROW;
                                    }
                                }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap");
/*mogłem to wpakować w Sass-a :P*/
/* pousuwać potem to co niepotrzebne */
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  /*scroll-behavior: smooth;*/
}

body{
  /*background-color: #717171;*/
  background: url("../img/bg.jpg");
  background-size: 10%;
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;

}

.wrapper{
  display: flex;
  /*position: relative;*/
}

.wrapper .sidebar{
  width: 220px;
  height: 100%;
  background: #4b4276;
  position: fixed;
  z-index: 1;
  -webkit-box-shadow: 5px 0px 5px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: 5px 0px 5px 0px rgba(0,0,0,0.75);
  box-shadow: 5px 0px 5px 0px rgba(0,0,0,0.75);
}

.wrapper .sidebar .sidebar-top h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  padding: 30px;
  /*border-right: 0px solid #e0e4e8;*/ /*borderrrrrrrrrrrrrrr*/

}

.wrapper .sidebar .sidebar-top ul li{
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(226,226,226,0.1);
  border-top: 1px solid rgba(226,226,226,0.1);
  height: 50px;

}    

.wrapper .sidebar .sidebar-top ul li a{
  color: #bdb8d7;
  display: block;
  width: 100%;
  height: 100%;
  padding-top: 15px;
  padding-left: 20px;
}

.wrapper .sidebar .sidebar-top ul li a .fas{ /* fonty (ikonki) */
  width: 25px;
  font-size: 20px;
  margin-right: 10px;
}

.wrapper .sidebar .sidebar-top ul li:hover{
  background-color: #594f8d;
}
    
.wrapper .sidebar .sidebar-top ul li:hover a{
  color: #fff;
}

.wrapper .sidebar .sidebar-bottom{
  height: 330px;

  background-color: #594f8d;
  position: relative;
}

.wrapper .sidebar .sidebar-bottom ul{
  position: absolute;
  bottom: 0px;
}

.wrapper .sidebar .sidebar-bottom ul li{
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(226,226,226,0.1);
  border-top: 1px solid rgba(226,226,226,0.1);
  height: 50px;
  width: 220px;
} 

.wrapper .sidebar .sidebar-bottom ul li a{
  display: block;
  width: 100%;
  height: 100%;
  padding-top: 15px;
  padding-left: 20px;
}

.wrapper .sidebar .sidebar-bottom ul li:hover a{
  background-color: #4b4276;
}

/*#########################################################*/
.wrapper .main_content{
  margin-left: 220px;
  /*height: 100vh;*/
  width: 100vw;
}

.wrapper .main_content .header{
  background-color: #594f8d;
  color: #717171;
  height: 90px;
  width: 100%;
  position: fixed;
  z-index: 1; /* <--- żeby kafelki .square po scrollowaniu były "pod" .header*/
  -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,1);
  -moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,1);
  box-shadow: 0px 5px 5px 0px rgba(0,0,0,1);
}

.wrapper .main_content .info{
  margin-top: 90px;
  width: 100%;
  height: 100%;
  line-height: 25px;
}

.wrapper .main_content .info .warn{
  text-align: center;
  padding: 40px;
}

.wrapper .main_content .info .warn .msg{
  background-color: rgb(210, 0, 0);
  margin-left: auto;
  margin-right: auto;
  width: 750px;
  border-radius: 20px;
  font-size: 26px;
  line-height: 30px;
  color: rgb(226, 226, 226);
  padding: 20px;
  -webkit-box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
  -moz-box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
  box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
}

.wrapper .main_content .info .square{
  text-align: justify;
  background-color: rgb(243, 243, 243);
  margin-bottom: 15px;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 15px;
  width: 380px;
  height: 280px;
  float: left;
  padding: 15px;
  border-radius: 20px;
  position: relative;
  -webkit-box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
  -moz-box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
  box-shadow: 0px 0px 10px 3px rgba(36,36,36,1);
}

.sign-out{
  /*line-height: 90px;*/
  text-align: center;
  text-align: right;
  padding-right: 240px;
  color: rgb(240, 240, 240);
  display: block;
  height: 100%;
}

.btn{
  color: #bdb8d7;
  font-size: 20px;
  border: 0;
  border-radius: 10px;
  margin: 20px;
  height: 50px;
  padding: 15px;
  background-color: #594f8d;
}

.btn:hover{
  cursor: pointer;
  color: black;
  background-color: #4b4276;
  color: #fff;
  border-radius: 10px;
}

.logo-header{
  height: 100%;
  float: left;  
}

.logo-header img{
  height: 70px;
  width: auto;
  margin: 10px 20px;
  border-radius: 10px;
  background-color: #bdb8d7;
}

.wrapper .main_content .header .sign-out a{
  color: #bdb8d7;
  padding: 15px;
  font-size: 20px;
}

.wrapper .main_content .header .sign-out a:hover{
  color: black;
  background-color: #4b4276;
  color: #fff;
  border-radius: 10px;
}

.wrapper .main_content .header .sign-out .fas{
  padding-left: 10px;
}

.scrollup{
	width: 64px;
	height: 64px;
	text-decoration: none;
	background: url("../img/up.png") no-repeat 0px 0px;
	position: fixed;
	right: 50px;
	bottom: 50px;
  display: none;
  z-index: 1;
}

.test{
  position: absolute;
  width: 350px;
  text-align: center;
  bottom: 0;
}

table{
    /*background-color: orangered;*/
    margin-left: auto;
    margin-right: auto;
    margin-top: 140px;
    margin-bottom: 20px;
    width: 100%;
    /*border: orchid;*/
    font-family: "Montserrat", sans-serif;
    background-color: #fff;
  border-radius: 20px;

}

th{
  /*border: 2px solid green;*/
  text-align: left;
  padding: 10px;
  border-bottom: 2px solid #eaeaea;
  font-weight: bold;
  border-spacing: 0px;
}

td{
  /*border: 2px solid red;*/
  padding: 10px;
  border-bottom: 1px solid #efefef;
  
}
tbody{
  width: 100%;

}

.table{
  background-color: #fff;
  width: 1500px;
  margin-left: auto;
  margin-right: auto;
  font-family: "Montserrat", sans-serif !important;

}

.column1{
  /*background-color: pink*/
}

.column2{
  /*background-color: yellow*/
}

.column3{

}

.column4{

}

.column5{
  
}

.column6{

}

/* ############################################################################# */


/*
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: "Montserrat", sans-serif;
}

body {
  background: #eaeaea;
}*/


.table_wrap {
  width: 1500px;
  margin: 140px auto 0;
}

.table_wrap ul li .item {
  display: flex;
  align-items: center;
  background: #fff;
  padding: 15px 0;
  height: 50px;
}

.table_wrap ul li .item .name {
  width: 25%;
  padding: 0 15px;
}

.table_wrap ul li .item .phone {
  width: 14%;
  padding: 0 15px;
}

.table_wrap ul li .item .status {
  width: 10%;
  padding: 0 15px;
}

.table_wrap ul li .item .issue {
  width: 12%;
  padding: 0 15px;
}

.table_wrap ul li .item .issue span,
.table_wrap ul li .item .name span {
  width: 90%;
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.table_header ul li .item {
  border-bottom: 2px solid #eaeaea;
  font-weight: 600;
}

.table_body {
  height: 300px;
  overflow: auto;
}

.table_body ul li .item {
  border-bottom: 1px solid #efefef;
}

.table_body ul li .item .status span,
.table_body ul li .item .issue span {
  padding: 5px 0px;
  border-radius: 10px;
  max-width: 115px;
  display: inline-block;
}